<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Boleto;
use App\Chave;
use App\Arrecadacao;
use Carbon\Carbon;
use App\Http\Requests;

class BarraController extends Controller
{
    public $type;
    public $barra;
    public $length ;
    private $formatted;
    public $object;

    public function index()
    {
        $codigo = Input::get('codigo');
        $this->barra = $codigo;
        $this->length  = strlen($codigo);
        if ($this->length == 44) {
            $this->object = $this->processa_barra($codigo);
        } else {
            $this->type = 0;
        }
        $result = json_encode($this, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return $result;
    }

    public function processa_barra($codigo){
        if ($codigo[0] == 8) {
            $SegDesc = array(1=> "Prefeituras", 2=> "Saneamento", 3=> "Energia Elétrica e Gás", 4=> "Telecomunicações", 5=> "Órgãos Governamentais",6=> "Carnes e Assemelhados ou demais", 7=> "Multas de trânsito", 9=> "Uso exclusivo do banco");

            $arrecadacao = new Arrecadacao();
            $arrecadacao->formatted = $this->formatar($codigo,substr($codigo,2, 1));
            $arrecadacao->idProd = substr($codigo,0, 1);
            $arrecadacao->idSeg = substr($codigo,1, 1);
            $arrecadacao->SegDesc = $SegDesc[$arrecadacao->idSeg];

            $arrecadacao->ref = substr($codigo,2, 1);
            $arrecadacao->valor = (substr($codigo,4, 9)*1) .",".substr($codigo,13, 2);
            if ($arrecadacao->idSeg == 6){
                $arrecadacao->cnpj = substr($codigo,15, 8);
                $arrecadacao->data = substr($codigo,23, 8);
                $arrecadacao->livre = substr($codigo,23, 21);
            } else {
                $arrecadacao->idEmpresa = substr($codigo,15, 4);
                switch ( $arrecadacao->idEmpresa ){
                    case "0040":
                    case "0110":
                        $arrecadacao->nome = 'CPFL';
                        $arrecadacao->conta_contrato = substr($codigo,32, 12);
                        break;
                    case "0105":
                        $arrecadacao->nome = 'SANASA';
                        $arrecadacao->dataVenc = substr($codigo,19, 8);
                        $arrecadacao->consumidor = substr($codigo,27, 7);
                        $arrecadacao->competencia = substr($codigo,34, 6);
                        $arrecadacao->resto = substr($codigo,40, 4);
                        break;
                    case "0071":
                        $arrecadacao->nome = 'SAAE';
                        $arrecadacao->dataVenc = substr($codigo,19, 8);
                        $arrecadacao->resto = substr($codigo,27, 17);
                        break;
                    case "0296":
                        $arrecadacao->nome = 'NET';
                        $arrecadacao->dataVenc = substr($codigo,19, 8);
                        $arrecadacao->cod = substr($codigo,27, 3);
                        $arrecadacao->resto = substr($codigo,30, 14);
                        break;
                    case "0080":
                        $arrecadacao->nome = 'VIVO';
                        $arrecadacao->conta = substr($codigo,23, 10);
                        $arrecadacao->competencia = substr($codigo,33, 4);
                        $arrecadacao->dataVenc = substr($codigo,38, 6);
                        $arrecadacao->resto = substr($codigo,30, 14);
                        break;
                    case "0179":
                        $arrecadacao->nome = 'FGTS';
                        $arrecadacao->dataVenc = substr($codigo,19, 6);
                        $arrecadacao->cnpjpagador = substr($codigo,32, 44);
                        break;
                    case "0328":
                        $arrecadacao->nome = 'DAS';
                        break;
                }
                $arrecadacao->livre = substr($codigo,19, 25);
            }
            $this->type = 3;
            return $arrecadacao;
        } else if ($this->isBoleto($codigo)) {
            $boleto = new Boleto();
            $this->type = 1;
            $boleto->formatted = $this->boleto_formatar($codigo);
            $boleto->vencimento = $this->fator_vencimento(substr($codigo,5, 4));
            $boleto->valor = (substr($codigo,9,8)*1) . ',' . substr($codigo,17,2);
            return $boleto;
        } else if ($this->isChave($codigo)) {
            $chave = new Chave();
            $this->type = 2;
            $chave->formatted = chunk_split($codigo, 4, ' ');
            $chave->codUF = substr($codigo,0, 2);
            $chave->dtEmisao = substr($codigo,4, 2) . "/". substr($codigo,2, 2);
            $chave->modelo = substr($codigo,20,2);
            $chave->serie = substr($codigo,22,3);
            $chave->nNota = substr($codigo,25,9);
            $chave->forma = substr($codigo,34,1);
            $chave->codNum = substr($codigo,35,8);
            $chave->dv = substr($codigo,43,1);
            $chave->cnpj = substr($codigo,6, 2) . "." . substr($codigo,8, 3) . "." . substr($codigo,11, 3) . "/" . substr($codigo,14, 4) . "-" . substr($codigo,18, 2);
            return $chave;
        } else {
            $this->type = 0;
            return null;
        }
    }

    public function isBoleto($codigo){
       if ($this->boleto_modulo11( substr($codigo,0,4) . substr($codigo,5,99)) == substr($codigo,4,1)) {
            return true;
        } else {
            return false;
        }

    }

    public function isChave($codigo){
        if(substr($codigo,20,2) !== '55')
        {
            return false;
        }
        $multiplicadores = array(2,3,4,5,6,7,8,9);
        $i = 42;
        $soma_ponderada = 0;
            while ($i >= 0) {
                for ($m=0; $m<count($multiplicadores) && $i>=0; $m++) {
                    $soma_ponderada+= $codigo[$i] * $multiplicadores[$m];
                    $i--;
                }
            }
            $resto = $soma_ponderada % 11;
            if ($resto == '0' || $resto == '1') {
                $digito = 0;
            } else {
                $digito = (11 - $resto);
            }

        if($digito == $codigo[43]) {
            return true;
        } else {
            return false;
        }

    }

    function arrecadacao_modulo10($numero)
    {
        $numero = preg_replace("/[^0-9]/", "", $numero);
        $multiplicadores = array(2,1,2,1,2,1,2,1,2,1,2);
        $i = 10;
        $soma_ponderada = 0;
        while ($i >= 0) {
            for ($m=0; $m<count($multiplicadores) && $i>=0; $m++) {
                $aux = $numero[$i] * $multiplicadores[$m];
                if ($aux >= 10) {
                    $soma_ponderada+=1;
                    $soma_ponderada+=$aux-10;
                } else {
                    $soma_ponderada+=$aux;
                }
                $i--;
            }
        }
        $digito = 10 - ($soma_ponderada % 10);
        return $digito;
    }

    function arrecadacao_modulo11($numero)
    {
        $numero = preg_replace("/[^0-9]/", "", $numero);
        $multiplicadores = array(2,3,4,5,6,7,8,9,2,3,4);
        $i = 10;
        $soma_ponderada = 0;
        while ($i >= 0) {
            for ($m=0; $m<count($multiplicadores) && $i>=0; $m++) {
                $soma_ponderada += $numero[$i] * $multiplicadores[$m];
                $i--;
            }
        }
        $digito = ($soma_ponderada % 11);
        return $digito;
    }

    public function formatar($codigo,$num)
    {
        $campo1 = substr($codigo,0,11);
        $campo2 = substr($codigo,11,11);
        $campo3 = substr($codigo,22,11);
        $campo4 = substr($codigo,33,11);

        if($num == 6 || $num == 7) {
            $linha =	 $campo1 . $this->arrecadacao_modulo10($campo1)
                .' '
                .$campo2 . $this->arrecadacao_modulo10($campo2)
                .' '
                .$campo3 . $this->arrecadacao_modulo10($campo3)
                .' '
                .$campo4 . $this->arrecadacao_modulo10($campo4);
            return $linha;
        }
        if($num == 8 || $num == 9) {
            $linha =	 $campo1 . $this->arrecadacao_modulo11($campo1)
                .' '
                .$campo2 . $this->arrecadacao_modulo11($campo2)
                .' '
                .$campo3 . $this->arrecadacao_modulo11($campo3)
                .' '
                .$campo4 . $this->arrecadacao_modulo11($campo4);
            return $linha;
        }



    }

    public function fator_vencimento ($dias) {
             $currentDate =  Carbon::now()->setDate(1997, 10, 7)->timestamp;
             $currentDate2 =  Carbon::createFromTimestamp($currentDate+(60 * 60 * 24 * $dias));
             return $currentDate2->format('d/m/Y');
         }

    public function boleto_modulo11($numero)
         {
             $numero = preg_replace("/[^0-9]/", "", $numero);
             $soma  = 0;
             $peso  = 2;
             $base  = 9;
             $resto = 0;
             $contador = strlen($numero)- 1;
             for ($i=$contador; $i >= 0; $i--) {
                $soma = $soma + ( substr($numero,$i,1) * $peso);
                 if ($peso < $base) {
                     $peso++;
                 } else {
                     $peso = 2;
                 }
            }
             $digito = 11 - ($soma % 11);
             if ($digito >  9) $digito = 0;
             if ($digito == 0) $digito = 1;
             return $digito;
         }


    function boleto_modulo10($numero)
         {
             $numero = preg_replace("/[^0-9]/", "", $numero);
             $soma  = 0;
             $peso  = 2;
             $contador = strlen($numero)- 1;
             while ($contador >= 0) {
                 $multiplicacao = ( substr($numero,$contador,1) * $peso );
                 if ($multiplicacao >= 10) {
                     $multiplicacao = 1 + ($multiplicacao-10);
                 }
                 $soma = $soma + $multiplicacao;
                 if ($peso == 2) {
                     $peso = 1;
                 } else {
                     $peso = 2;
                 }
                 $contador = $contador - 1;
             }
             $digito = 10 - ($soma % 10);
             if ($digito == 10) $digito = 0;
             return $digito;
         }

    function boleto_formatar($linha)
         {
             if ($this->boleto_modulo10('399903512') != 8) {
                 return false;
             }
              $campo1 = substr($linha,0,4) . substr($linha,19,1) . '.' . substr($linha,20,4);
              $campo2 = substr($linha,24,5) . '.' . substr($linha,24+5,5);
              $campo3 = substr($linha,34,5) . '.' . substr($linha,34+5,5);
              $campo4 = substr($linha,4,1);		// Digito verificador
              $campo5 = substr($linha,5,14);	// Vencimento + Valor
             if ($campo5 == 0) $campo5 = '000';
             $linha =	 $campo1 . $this->boleto_modulo10($campo1)
                 .' '
                 .$campo2 . $this->boleto_modulo10($campo2)
                 .' '
                 .$campo3 . $this->boleto_modulo10($campo3)
                 .' '
                 .$campo4
                 .' '
                 .$campo5
             ;
             //if (form.linha.value != form.linha2.value) alert('Linhas diferentes');
             return $linha;
         }

}


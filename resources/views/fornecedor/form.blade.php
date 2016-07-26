
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field($methodfield) }}
<div class="row">
    <div class="col-md-5 col-xs-12">
        <br />
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Apelido</label>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <input type="text" name="apelido" class="form-control" placeholder="Apelido" value="{{ isset($fornecedores)? $fornecedores->apelido: old('apelido') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Razão</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input type="text" name="razao" class="form-control" placeholder="Razão Social" value="{{ isset($fornecedores)? $fornecedores->razao: old('razao') }}" required>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">CNPJ</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="99.999.999/9999-99" value="{{ isset($fornecedores)? $fornecedores->cnpj: old('cnpj') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="email" class="form-control" placeholder="nome@email.com.br" value="{{ isset($fornecedores)? $fornecedores->email: old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contato</label>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="contato" class="form-control" placeholder="Nome" value="{{ isset($fornecedores)? $fornecedores->contato: old('contato') }}">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text"  id="telefone"  name="telefone" class="form-control telefone" placeholder="(99) 99999-9999" value="{{ isset($fornecedores)? $fornecedores->telefone: old('telefone') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Endereco</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input type="text" class="form-control" name="endereco" placeholder="Endereco" value="{{ isset($fornecedores)? $fornecedores->endereco: old('endereco') }}">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <input type="text" class="form-control" name="num" placeholder="Nº" value="{{ isset($fornecedores)? $fornecedores->num: old('num') }}">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <input style="border-radius: 4px;" type="text" class="form-control" name="comp" placeholder="Comp" value="{{ isset($fornecedores)? $fornecedores->comp: old('comp') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
            <div class="col-md-3 col-sm-3 col-xs-4">
                <input type="text" id="cep" name="cep" class="form-control" placeholder="99999-999" value="{{ isset($fornecedores)? $fornecedores->cep: old('cep') }}" >
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <select class="select2_single form-control" name="estado" tabindex="-1">
                    <option disabled selected>Estado</option>
                    <option {{ (old('estado') == 'AC' OR (isset($fornecedores) AND ($fornecedores->estado == 'AC') )) ? 'selected' : '' }} value="AC">Acre</option>
                    <option {{ (old('estado') == 'AL' OR (isset($fornecedores) AND ($fornecedores->estado == 'AL') )) ? 'selected' : '' }} value="AL">Alagoas</option>
                    <option {{ (old('estado') == 'AP' OR (isset($fornecedores) AND ($fornecedores->estado == 'AP') )) ? 'selected' : '' }} value="AP">Amapá</option>
                    <option {{ (old('estado') == 'AM' OR (isset($fornecedores) AND ($fornecedores->estado == 'AM') )) ? 'selected' : '' }} value="AM">Amazonas</option>
                    <option {{ (old('estado') == 'BA' OR (isset($fornecedores) AND ($fornecedores->estado == 'BA') )) ? 'selected' : '' }} value="BA">Bahia</option>
                    <option {{ (old('estado') == 'CE' OR (isset($fornecedores) AND ($fornecedores->estado == 'CE') )) ? 'selected' : '' }} value="CE">Ceará</option>
                    <option {{ (old('estado') == 'DF' OR (isset($fornecedores) AND ($fornecedores->estado == 'DF') )) ? 'selected' : '' }} value="DF">Distrito Federal</option>
                    <option {{ (old('estado') == 'ES' OR (isset($fornecedores) AND ($fornecedores->estado == 'ES') )) ? 'selected' : '' }} value="ES">Espirito Santo</option>
                    <option {{ (old('estado') == 'GO' OR (isset($fornecedores) AND ($fornecedores->estado == 'GO') )) ? 'selected' : '' }} value="GO">Goiás</option>
                    <option {{ (old('estado') == 'MA' OR (isset($fornecedores) AND ($fornecedores->estado == 'MA') )) ? 'selected' : '' }} value="MA">Maranhão</option>
                    <option {{ (old('estado') == 'MS' OR (isset($fornecedores) AND ($fornecedores->estado == 'MS') )) ? 'selected' : '' }} value="MS">Mato Grosso do Sul</option>
                    <option {{ (old('estado') == 'MT' OR (isset($fornecedores) AND ($fornecedores->estado == 'MT') )) ? 'selected' : '' }} value="MT">Mato Grosso</option>
                    <option {{ (old('estado') == 'MG' OR (isset($fornecedores) AND ($fornecedores->estado == 'MG') )) ? 'selected' : '' }} value="MG">Minas Gerais</option>
                    <option {{ (old('estado') == 'PA' OR (isset($fornecedores) AND ($fornecedores->estado == 'PA') )) ? 'selected' : '' }} value="PA">Pará</option>
                    <option {{ (old('estado') == 'PB' OR (isset($fornecedores) AND ($fornecedores->estado == 'PB') )) ? 'selected' : '' }} value="PB">Paraíba</option>
                    <option {{ (old('estado') == 'PR' OR (isset($fornecedores) AND ($fornecedores->estado == 'PR') )) ? 'selected' : '' }} value="PR">Paraná</option>
                    <option {{ (old('estado') == 'PE' OR (isset($fornecedores) AND ($fornecedores->estado == 'PE') )) ? 'selected' : '' }} value="PE">Pernambuco</option>
                    <option {{ (old('estado') == 'PI' OR (isset($fornecedores) AND ($fornecedores->estado == 'PI') )) ? 'selected' : '' }} value="PI">Piauí</option>
                    <option {{ (old('estado') == 'RJ' OR (isset($fornecedores) AND ($fornecedores->estado == 'RJ') )) ? 'selected' : '' }} value="RJ">Rio de Janeiro</option>
                    <option {{ (old('estado') == 'RN' OR (isset($fornecedores) AND ($fornecedores->estado == 'RN') )) ? 'selected' : '' }} value="RN">Rio Grande do Norte</option>
                    <option {{ (old('estado') == 'RS' OR (isset($fornecedores) AND ($fornecedores->estado == 'RS') )) ? 'selected' : '' }} value="RS">Rio Grande do Sul</option>
                    <option {{ (old('estado') == 'RO' OR (isset($fornecedores) AND ($fornecedores->estado == 'RO') )) ? 'selected' : '' }} value="RO">Rondônia</option>
                    <option {{ (old('estado') == 'RR' OR (isset($fornecedores) AND ($fornecedores->estado == 'RR') )) ? 'selected' : '' }} value="RR">Roraima</option>
                    <option {{ (old('estado') == 'SC' OR (isset($fornecedores) AND ($fornecedores->estado == 'SC') )) ? 'selected' : '' }} value="SC">Santa Catarina</option>
                    <option {{ (old('estado') == 'SP' OR (isset($fornecedores) AND ($fornecedores->estado == 'SP') )) ? 'selected' : '' }} value="SP">São Paulo</option>
                    <option {{ (old('estado') == 'SE' OR (isset($fornecedores) AND ($fornecedores->estado == 'SE') )) ? 'selected' : '' }} value="SE">Sergipe</option>
                    <option {{ (old('estado') == 'TO' OR (isset($fornecedores) AND ($fornecedores->estado == 'TO') )) ? 'selected' : '' }} value="TO">Tocantins</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-4">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="{{ isset($fornecedores)? $fornecedores->cidade: old('cidade') }}">
            </div>
        </div>

    </div>
    <div class="col-md-5 col-xs-12">
        <br />

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Prazo</label>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <input type="text" class="form-control" name="prazoentrega" id="prazoentrega" placeholder="Entrega" value="{{ isset($fornecedores)? $fornecedores->prazoentrega: old('prazoentrega') }}">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <input type="text" class="form-control" name="prazofatura" id="prazofatura" placeholder="Faturamento" value="{{ isset($fornecedores)? $fornecedores->prazofatura: old('prazofatura') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Forma Pagamento</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" placeholder="" name="forma" value="{{ isset($fornecedores)? $fornecedores->forma: old('forma') }}" required>
                    <option disabled selected>Forma</option>
                    <option {{ (old('cargo') == 1 OR (isset($fornecedores) AND ($fornecedores->forma == 1) )) ? 'selected' : '' }} value="1">Boleto</option>
                    <option {{ (old('cargo') == 2 OR (isset($fornecedores) AND ($fornecedores->forma == 2) )) ? 'selected' : '' }} value="2">Transferência</option>
                    <option {{ (old('cargo') == 3 OR (isset($fornecedores) AND ($fornecedores->forma == 3) )) ? 'selected' : '' }} value="3">Dinheiro</option>
                    <option {{ (old('cargo') == 4 OR (isset($fornecedores) AND ($fornecedores->forma == 4) )) ? 'selected' : '' }} value="4"></option>
                </select>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" class="form-control money-bank" id="faturamento" name="faturamento" placeholder="Faturamento Mínimo" value="{{ isset($fornecedores)? $fornecedores->faturamento: old('faturamento') }}" required>
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                <button type="submit" class="btn btn-success">{{ $buttonlabel }}</button>
                <a href="/fornecedores" class="btn btn-default" role="button">Cancelar</a>
            </div>
        </div>

    </div>
</div>

@push('scripts')

<script>
    Number.prototype.formatMoney = function(c, d, t){
        var n = this,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? "," : t,
                s = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };

    var inputs = $('input.money-bank');

    $('input.money-bank').on('keydown',function(e){
        // tab, esc, enter
        if ($.inArray(e.keyCode, [9, 27, 35, 39, 10]) !== -1 ||
                // Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true)) {
            return;
        }

        if (e.keyCode == 40 || e.keyCode == 13) {
            e.preventDefault();
            var nextInput = inputs.get(inputs.index(this) + 1);
            if (nextInput) {
                nextInput.focus();
            }
        }

        if (e.keyCode == 38) {
            e.preventDefault();
            var nextInput = inputs.get(inputs.index(this) - 1);
            if (nextInput) {
                nextInput.focus();
            }
        }

        e.preventDefault();

        // backspace & del
        if($.inArray(e.keyCode,[8,46]) !== -1){
            $(this).val('');
            return;
        }

        var a = ["a","b","c","d","e","f","g","h","i","`","1","2","3","4","5","6","7","8","9","0"];
        var n = ["1","2","3","4","5","6","7","8","9","0","1","2","3","4","5","6","7","8","9","0"];

        var value = $(this).val();
        var clean = value.replace(/\./g,'').replace(/,/g,'').replace(/^0+/, '');

        var charCode = String.fromCharCode(e.keyCode);
        var p = $.inArray(charCode,a);

        if(p !== -1)
        {
            value = clean + n[p];

            if(value.length == 2) value = '0' + value;
            if(value.length == 1) value = '00' + value;

            var formatted = '';
            for(var i=0;i<value.length;i++)
            {
                var sep = '';
                if(i == 2) sep = ',';
                if(i > 3 && (i+1) % 3 == 0) sep = '.';
                formatted = value.substring(value.length-1-i,value.length-i) + sep + formatted;
            }

            $(this).val(formatted);
        }

        return;

    });
</script>

<!-- jquery.inputmask -->
<script>
    $(document).ready(function() {
        //$(".telefone").inputmask({ mask: ["(99) 99999-9999", "(99) 9999-9999", ], keepStatic: true });
        var maskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                options = {onKeyPress: function(val, e, field, options) {
                    field.mask(maskBehavior.apply({}, arguments), options);
                }
                };

        $('#telefone').mask(maskBehavior, options);
        $('#cnpj').mask("99.999.999/9999-99");
        $('#cep').mask("99999-999");
        $('#prazoentrega').mask("999");
        $('#prazofatura').mask("999");
    });
</script>
<!-- /jquery.inputmask -->
@endpush
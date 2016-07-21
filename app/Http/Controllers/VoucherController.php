<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Voucher;
use Auth;
use App\VoucherAudit;
use App\Http\Requests;
use phpDocumentor\Reflection\Types\This;

class VoucherController extends ForaController
{
    

    public function index()
    {
        setlocale(LC_TIME, 'pt_BR.utf8');
        $vouchers = Voucher::orderby('data','desc')->get();


        $vouchers->date = Carbon::now()->subDays(30);
        $expired = Carbon::now()->subDays(30);
        return view('voucher', ['vouchers' => $vouchers, 'expired' => $expired] );
    }

    public function store(Request $request, Voucher $voucher)
    {
        $data = $request->except(['_token']);
        $data['data'] = Carbon::now();
        $data['site_id'] = intval($data['site_id']);
        $audit = new VoucherAudit;
        $audit->action = 'INSERT';
        $audit->data = Carbon::now();
        $audit->lista = $data['lista'];
        $id = $voucher->create($data)->id;
        $audit->user_id = Auth::user()->id;
        $audit->voucher_id = $id;
        $audit->save();
        return $id;
    }

    public function update(Request $request, Voucher $voucher)
    {
        $data = $request->except(['_token']);
        $voucher->lista = $data['lista'];
        $voucher->id = $data['id'];
        $audit = new VoucherAudit;
        $audit->action = 'UPDATE';
        $audit->data = Carbon::now();
        $audit->voucher_id = $data['id'];
        $audit->lista = $data['listaanterior'];
        $audit->listanova = $data['lista'];
        $audit->user_id = Auth::user()->id;
        $voucher->update($data);
        $audit->save();
        return "Voucher para " . $voucher->nome  . " atualizado com sucesso.";
    }

    public function delete(Request $request, Voucher $voucher)
    {
        $data = $request->except(['_token']);
        $voucher->id = $data['id'];
        $audit = new VoucherAudit;
        $audit->nome = $voucher->nome;
        $audit->lista = $voucher->lista;
        $audit->action = 'DELETE';
        $audit->data = Carbon::now();
        $audit->voucher_id = $data['id'];
        $audit->user_id = Auth::user()->id;
        $voucher->delete();
        $audit->save();
        return "Voucher para " . $voucher->nome  . " removido com sucesso.";
    }

    public function listaudit(Request $request, Voucher $voucher)
    {
        $audit =  VoucherAudit::where('voucher_id', '=', $voucher->id )->get();
        return $audit;
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $timestamps = false;
    protected $fillable =  ['data', 'nome', 'lista', 'loja','site_id'];

    protected $dates = ['data'];

    public function franqueado()
    {
        return $this->hasOne('App\Franqueado', 'id', 'site_id');
    }

    public function audits()
    {
        return $this->hasMany('App\VoucherAudit', 'voucher_id', 'id');
    }

}

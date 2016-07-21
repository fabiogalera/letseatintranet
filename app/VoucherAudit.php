<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherAudit extends Model
{
    public $timestamps = false;
    protected $table = 'vouchers_audit';
    
    protected $fillable =  ['data', 'action','lista','listanova','user_id','voucher_id'];

    public function voucher()
    {
        return $this->belongsTo('App\Voucher', 'id', 'voucher_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

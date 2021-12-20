<?php

namespace Pondol\BtcPayment\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'address', 'txid'];//


   public function user()
   {
       return $this->belongsTo(config('bitcoind.user'));
   }

   public function scopeSame_address($query, $address)
   {
       return $query->where('paid', 1)->where('address', $address);
   }


   public function scopeUnpaid($query)
   {
       return $query->where('txid', '=','');
   }

   public function scopeNot_confirmed($query)
   {
       return $query->where('txid','!=','')
                    ->where('paid','=', 0);

   }

   public function scopePaid($query)
   {
       return $query->where('paid','=', 1);
   }
}

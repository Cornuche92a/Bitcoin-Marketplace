<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['user_id','address'];


   public function user()
   {
       return $this->belongsTo('App\User');
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

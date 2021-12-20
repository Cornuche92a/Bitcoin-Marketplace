<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
    protected $table='orders';
    protected $fillable = ['log_id','user_id'];

    use HasFactory;

    public function user(){
       return $this->belongsTo(User::class);

    }

    public function log(){
        return $this->belongsTo(logs::class);

    }

    public function state(){
        return $this->belongsTo(state_order::class,'states_id');
    }

    public function tickets()
    {
        return $this->hasMany(tickets::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    protected $fillable =['user_id','order_id','description','product_id'];
    use HasFactory;

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function state(){
        return $this->belongsTo(state::class,'state_id');
    }

    public function conversation(){
        return $this->hasMany(ticket_conversation::class,'ticket_id');

    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}

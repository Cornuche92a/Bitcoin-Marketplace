<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state_order extends Model
{
    protected $table='state_order';
    use HasFactory;

    public function order(){
        return $this->hasMany(Order::class);
    }
}

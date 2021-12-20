<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table='states';
    use HasFactory;


  //  public function order(){
  //      return $this->belongsTo('App\Order');
  //  }
}

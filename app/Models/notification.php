<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $fillable = ['user_id','notification_id'];
    use HasFactory;
    protected $table='notifications';

    public function type(){
        return $this->belongsTo(notifications_types::class,'notification_id');
    }
}

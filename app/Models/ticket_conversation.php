<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket_conversation extends Model
{
    protected $fillable=['ticket_id','message_id','user_id'];


    use HasFactory;

    public function message(){
        return $this->belongsTo(ticket_message::class,'message_id');
    }

    public function ticket(){
        return $this->belongsTo(tickets::class,'ticket_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}

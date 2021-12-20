<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{

    use HasFactory;
    public function category(){
        $table="logs";

        return $this->belongsTo(category::class);

    }

    public function categoryforticket(){
        $table="logs";

        return $this->hasOne(category::class);

    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avatar extends Model
{
    protected $table = 'avatars';
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

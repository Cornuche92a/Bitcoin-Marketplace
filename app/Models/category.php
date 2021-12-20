<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'category';

    public function logs(){
        return $this->hasMany(logs::class,'category_id');
    }

    public static function getall(){
        return Category::getAll();

    }
}

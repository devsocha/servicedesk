<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_categoria',
        'name',
        'photo',

    ];
    public function category(){
        return $this->hasOne(Category::class,'id','id_categoria');
    }
    public function user(){
        return $this->hasOne(User::class,'id','aprover');
    }
}

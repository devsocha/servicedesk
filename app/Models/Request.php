<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'id_user',
        'id_technik',
        'filename',
        'form_id',
    ];
    public function User(){
        return $this->belongsTo(User::class,'id');
    }
}

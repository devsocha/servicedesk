<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprove extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_id',
        'aprover_id',
        'token',
        'status',
        'created_at',
    ];
}

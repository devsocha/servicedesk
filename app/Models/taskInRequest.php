<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taskInRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'status',
    ];

    public function task(){
        return $this->hasOne(Task::class,'id','task_id');
    }
}

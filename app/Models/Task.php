<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Promise\task;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'title',
        'description',
        'status',
    ];
    public function taskInRequest(){
        return $this->belongsTo(taskInRequest::class , 'task_id');
    }
}

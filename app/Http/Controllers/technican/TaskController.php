<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Task;
use App\Models\taskInRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public static function getTasks($requestId){
        return taskInRequest::where('request_id',$requestId)->get();
    }
    public static function getTask($requestId){
        return taskInRequest::where('request_id',$requestId)->get();
    }
    public static function getTaskInOptions($requestId){
        return Task::where('request_id',$requestId)->get();
    }
    public static function deleteTasks($taskId){
        taskInRequest::where('task_id',$taskId)->delete();
        return Task::where('id',$taskId)->delete();
    }
    public static function completedTask($id){
        try{
            taskInRequest::where('id',$id)->update([
                'status'=>'Completed',
            ]);
            return redirect()->back();
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Error']);
        }
    }
    public static function addTaksToRequest($idForm, $idRequest){
            $tasks = Task::where('request_id',$idForm)->get();
            foreach($tasks as $task){
                taskInRequest::create([
                    'task_id'=>$task->id,
                    'request_id'=>$idRequest,
                    'status'=>'Open',
                ]);
            }
    }
    public static function returnTask($id){
        try{
            taskInRequest::where('id',$id)->update([
                'status'=>'Open',
            ]);
            return redirect()->back();
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Error']);
        }
    }
    public static function addTask(Request $request){
        try{
            $request->validate([
                'requestId'=>'required',
                'task'=>'required',
                'desc'=>'required',
            ]);
            Task::create([
                'request_id'=>$request->requestId,
                'title'=>$request->task,
                'description'=>$request->desc,
            ]);
            return redirect()->back()->with(['success'=>'Poprawnie dodano zadanie']);
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Wystąpił błąd, spróbuj ponownie później']);
        }

    }

}

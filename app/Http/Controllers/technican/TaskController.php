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
        $request = \App\Models\Request::where('id',$requestId)->first();
        return Task::where('request_id',$request->form_id)->get();
    }
    public static function getTask($requestId){
        $request = Form::where('id',$requestId)->first();
        return Task::where('request_id',$request->id)->get();
    }
    public static function deleteTasks($taskId){
        return Task::where('id',$taskId)->delete();
    }
    public static function completedTask($id){
        try{
            Task::where('id',$id)->update([
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
            Task::where('id',$id)->update([
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
                'status'=>'Open',
            ]);
            return redirect()->back()->with(['success'=>'Poprawnie dodano zadanie']);
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Wystąpił błąd, spróbuj ponownie później']);
        }

    }
    //TODO wywalenie statusu i przepięcie go pod inny model
}

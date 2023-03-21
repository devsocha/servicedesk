<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public static function getTasks($requestId){
        return Task::where('request_id',$requestId)->get();
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
    //TODO modul zadan dla technika do requestu
}

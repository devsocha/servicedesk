<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function addTaskView($id){
        return;
    }
    public static function addTask(Request $request){
        try{
            $request->validate([
                'idRequest'=>'required',
                'title'=>'required',
                'desc'=>'desc'
            ]);
            Task::create([
                'request_id'=>$request->idRequest,
                'title'=>$request->title,
                'description'=>$request->desc,
            ]);
            return redirect()->back()->with(['success'=>'Poprawnie dodano zadanie']);
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Wystąpił błąd, spróbuj ponownie później']);
        }

    }
    //TODO modul zadan dla technika do requestu
}

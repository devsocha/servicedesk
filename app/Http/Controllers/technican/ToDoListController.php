<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{

    public function addToDo(Request $request){
        try{
            $id_user = Auth::guard('web')->user()->id;
            $request->validate([
                'text'=>'required|text',
            ]);
            if(ToDoList::where('technik_id',$id_user)->count()>3){
                return redirect()->back()->with([
                    'error'=>'Wystąpił błąd, maksymalna ilość zadań jest równa 3',
                ]);
            }else{
                ToDoList::create([
                    'nazwa'=>$request->nazwa,
                    'technik_id'=>$id_user,
                ]);
                return redirect()->back()->with([
                    'success'=>'Poprawnie dodano zadanie do listy',
                ]);
            }
        }catch (\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }

}

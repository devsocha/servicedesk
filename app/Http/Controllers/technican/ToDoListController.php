<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{

    public function addToDo(Request $request){
        try{
            $id_user = Auth::guard('web')->user()->id;
            $request->validate([
                'text'=>'required',
            ]);
            if(ToDoList::where('technik_id',$id_user)->count()>=4){
                return redirect()->back()->with([
                    'error'=>'Wystąpił błąd, maksymalna ilość zadań jest równa 3',
                ]);
            }else{
                ToDoList::create([
                    'nazwa'=>$request->text,
                    'technik_id'=>$id_user,
                ]);
                return redirect()->back()->with([
                    'success'=>'Poprawnie dodano zadanie do listy',
                ]);
            }
        }catch (\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd, spróbuj ponownie później'.$e,
            ]);
        }
    }
    public function removeToDo($id){
        try{
            ToDoList::where('id',$id)->delete();
            return redirect()->back()->with([
                'success'=>'Poprawnie usunięto zadanie z listy',
            ]);
        }catch (\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }

}

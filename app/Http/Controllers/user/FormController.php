<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\technican\TaskController;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index($id){
        $form = Form::where('id',$id)->first();
        return view('general.form',[
            'form'=>$form,
        ]);
    }
    public function submit(Request $request){
        try{
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'file'=>'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if($request->hasFile('file')){
                $ext = $request->file('file')->extension();
                $fullName = $request->id_user.hash('sha256',time()).'.'.$ext;
                $request->file('file')->move(public_path('/uploads/requests/'),$fullName);
                $requests = \App\Models\Request::create([
                    'filename'=>$fullName,
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_user'=>$request->id_user,
                    'form_id'=>$request->idForm,
                ]);
                TaskController::addTaksToRequest($request->idForm,$requests->id);
            }else{
                $requests = \App\Models\Request::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_user'=>$request->id_user,
                    'form_id'=>$request->idForm,
                ]);
                TaskController::addTaksToRequest($request->idForm,$requests->id);

            }
            return redirect()->route('home')->with([
                'success'=>'Correct added request',
            ]);
        }catch(\Exception $e){
            echo $e;
//            return redirect()->back()->with(['error'=>'Wystąpił błąd spróbuj ponownie później']);
        }

    }


   // Dodanie załącznika do formularza./
    //dodanie zadan do formularza
    //Poprawienia widokow
    //akceptujacy dla formularzy
}

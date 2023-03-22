<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
                \App\Models\Request::create([
                    'filename'=>$fullName,
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_user'=>$request->id_user,
                    'form_id'=>0,
                ]);
            }else{
                \App\Models\Request::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_user'=>$request->id_user,
                    'form_id'=>1,
                ]);
            }
            return redirect()->route('home')->with([
                'success'=>'Correct added request',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'Wystąpił błąd spróbuj ponownie później']);
        }

    }


   // Dodanie załącznika do formularza./
    //dodanie zadan do formularza
    //Poprawienia widokow
    //akceptujacy dla formularzy
}

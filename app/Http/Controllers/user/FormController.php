<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Information;
use App\Models\Information_option;
use Illuminate\Console\View\Components\Info;
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
        $request->validate([
                        'title'=>'required',
                        'description'=>'required',
                    ]);
        \App\Models\Request::create([
            'title' => $request->title,
            'description' => $request->description,
            'id_user'=>$request->id_user,
        ]);
        return redirect()->route('home')->with([
            'success'=>'Correct added request',
        ]);
    }


   // Dodanie załącznika do formularza./
    //dodanie zadan do formularza
    //Poprawienia widokow
    //akceptujacy dla formularzy
}

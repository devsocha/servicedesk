<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index($id){
        $forms = Form::where('id_categoria',$id)->get();
        return view('general.forms')->with('forms',$forms);
    }
}

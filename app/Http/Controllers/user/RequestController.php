<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index(){
        $id = Auth::guard('web')->user()->id;
        $requests = \App\Models\Request::where('id_user',$id)->orderBy('created_at','desc')->get();
        return view('general.request')->with([
            'requestsInfo'=>$requests,
        ]);
    }
    public function show($id)
    {
        $form = \App\Models\Request::where('id', $id)->first();
        $technican = User::where('id',$form->id_technik)->first();
        return view('general.requestView', [
            'form' => $form,
            'technican'=>$technican,
        ]);
    }
}

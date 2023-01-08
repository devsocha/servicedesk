<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    public function index($token,$email){
        return view('putPassword',compact('token','email'));
    }
    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }

    public function userRegistration(){

        if(User::where('email',$email)->where('token',$token)->exists()){
            User::update([
                'password'=>$request->password,
                'status'=>'Potwierdzone',
            ]);
        }
    }
}
//TO DO zrobić widok putPassword oraz dokonczyc weryfikacje usera

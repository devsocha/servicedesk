<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    public function index($token,$email){
        return view('general.registration',compact('token','email'));
    }
    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }

    public function userRegistration(){
        $request->validate([
            'password'=>'require',
            'retypePassword'=>'require|same:password',
        ]);
        if(User::where('email',$email)->where('token',$token)->exists()){
            User::update([
                'password'=>$request->password,
                'status'=>'Potwierdzone',
            ]);
        }else{
            return;
        }
    }
    public function login(){
        return view('general.login');
    }
}
//TODO zrobić widok putPassword oraz dokonczyc weryfikacje usera

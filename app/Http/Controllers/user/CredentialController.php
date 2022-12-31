<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class CredentialController extends Controller
{
    public function index($token,$email){
        return view('general.registration',compact('token','email'));
    }
    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }

    public function userRegistration(Request $request){
        $request->validate([
            'password'=>'required',
            'retypePassword'=>'required|same:password',
        ]);
        if(User::where('email',$request->email)->where('token',$request->token)->exists()){
            User::where('email',$request->email)->where('token',$request->token)->update([
                'password'=>Hash::make($request->password),
                'status'=>'Potwierdzone',
                'token'=>'',
            ]);
            return redirect()->route('login')->with(['success'=>'Account verified correctly']);
        }else{
            return redirect()->back()->with(['error'=>'This account link expired']);
        }
    }
    public function login(){
        return view('general.login');
    }
}
//TODO zrobić widok putPassword oraz dokonczyc weryfikacje usera

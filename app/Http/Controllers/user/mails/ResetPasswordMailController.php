<?php

namespace App\Http\Controllers\user\mails;

use App\Http\Controllers\Controller;
use App\Mail\RestartPassword;
use App\Mail\WebsiteEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordMailController extends Controller
{
    public function sender(Request $request){
        $request->validate([
            'email'=>'email|required',
        ]);
        $token = hash('sha256',time());
        if(User::where('email',$request->email)->exists()){
            User::where('email',$request->email)->update([
                'token'=>$token,
            ]);
            $link = url('general/reset-password'."/".$token.'/'.$request->email);
            $subject = 'Reset your password';
            $body = 'Hello, <br><br> For restart your passord please press a link: <br> <a href="'.$link.'">Reset link</a><br><br> Regards';
            Mail::to($request->email)->send(new RestartPassword($subject, $body));
            return redirect()->back()->with(['success'=>'Email was send.']);
        }
    }
    public function resetView($token,$email){
        return view('general.restartPassword')->with([
            'token'=>$token,
            'email'=>$email,
        ]);
    }
    public function resetViewSubmit(Request $request){
        if(User::where('token',$request->token)->where('email',$request->email)->exists()){
            $request->validate([
                'password'=>'required',
                'retypePassword'=>'required| same:password'
            ]);
            User::where('token',$request->token)->where('email',$request->email)->update([
                'token'=>'',
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success','Password change correctly');
        }
        return redirect()->back()->with(['error'=>'This account link expired']);
    }
}

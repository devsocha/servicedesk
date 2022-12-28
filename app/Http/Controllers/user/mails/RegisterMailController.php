<?php

namespace App\Http\Controllers\user\mails;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterMailController extends Controller
{


    public function sender(Request $request){
        $request->validate([
            'email'=>'email|required',
            'name'=>'required',
            'secoundName'=>'required',
            'login'=>'required',
        ]);
        $token = hash('sha256',time());
        if(User::where('email',$request->email)->orwhere('login',$request->login)->exists()){
            return redirect()->back()->with(['error'=>'account exists.']);
        }

        User::create([
            'email'=>$request->email,
            'login'=> $request->login,
            'imie'=>$request->name,
            'nazwisko'=>$request->secoundName,
            'token'=>$token,
            'id_firma'=>$request->company,
        ]);

        $link = url('general/registration'."/".$token.'/'.$request->email);
        $subject = 'Register your User account';
        $body = 'Hello, <br><br> For finish your registration please press a link: <br> <a href="'.$link.'">Registration link</a><br><br> Regards';
          Mail::to($request->email)->send(new WebsiteEmail($subject, $body));
        return redirect()->back()->with(['success'=>'Account created and email was send.']);
    }
}

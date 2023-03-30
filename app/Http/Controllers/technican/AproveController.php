<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Aprove;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AproveController extends Controller
{
    public function addNewAprover(){

    }
    public function sendMail($idUser,$idAprove){
        $token = hash('sha256',time());
        try{
            Aprove::where('id',$idAprove)->update([
                'token'=> $token,
            ]);
            $user = User::where('id',$idUser)->first();
            $subject = 'Your Accept or Reject request';
            $link = url('/aprove/request/'.$idAprove.'/'.$token);
            $body = 'Hi '.$user->imie.' '.$user->nazwisko.',<br> You have to accept or reject a request. </br> You can do it from this link: <a href="'.$link.'">Link</a> ';
            return Mail::to($user->email)->send(new WebsiteEmail($subject,$body));
        }catch (\Exception $e){

        }
    }
}

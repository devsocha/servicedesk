<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Aprove;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AproveController extends Controller
{
    public static function addAprover(Request $request){
        Form::where('id',$request->requestId)->update([
            'aprover'=>$request->id,
        ]);
        return redirect()->back();
    }
    public static function addNewAproverWhenReqeuestCreated($requestId, $idForm){
        try{
            $form = Form::where('id',$idForm)->first();
            $aproverId = $form->aprover;
            if($aproverId){
                $aprove = Aprove::create([
                    'request_id'=>$requestId,
                    'aprover_id'=>$aproverId,
                    'status'=>'Waiting',
                    'token'=>'',
                ]);
                $requestUpdated = \App\Models\Request::where('id',$requestId)->update([
                    'aprove_id'=>$aprove->id,
                ]);
                AproveController::sendMail($aproverId,$aprove->id);
                return;
            }else{
                return;
            }

        }catch (\Exception $e){

        }
    }

    public static function getAprove($idAprove)
    {
        return Aprove::where('id',$idAprove)->first();
    }

    public function deleteAprover($requestId){
        Form::where('id',$requestId)->update([
            'aprover'=> null,
        ]);
        return redirect()->back();
    }
    public static function sendMail($idUser,$idAprove){
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

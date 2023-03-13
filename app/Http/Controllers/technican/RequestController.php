<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index($id){
        $form = \App\Models\Request::where('id',$id)->first();
        $myId = Auth::guard()->user()->id;
        $technicans = User::where('rola','!=',1)->where('id','!=',$myId)->get();
        $technican = User::where('id',$form->id_technik)->first();
        return view('admin.requestView',[
            'form' => $form,
            'technicans'=>$technicans,
            'technican'=>$technican,
        ]);
    }
    public function getTechnican($id){
        $myId = Auth::guard()->user()->id;
        \App\Models\Request::where('id',$id)->update([
            'status'=>'in progress',
            'id_technik'=>$myId,
        ]);
        return redirect()->back();
    }
    public function getNewTechnican($id,Request $request){
        \App\Models\Request::where('id',$id)->update([
            'id_technik'=>$request->idTechnican,
        ]);
        return redirect()->back();
    }
    public function endRequest($id){
        \App\Models\Request::where('id',$id)->update([
            'status'=>'closed',
        ]);
        return redirect()->back();
    }
    public static function download($file){
        return response()->download(public_path('uploads/requests/').$file);
    }
}

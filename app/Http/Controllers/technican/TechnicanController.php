<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Http\Controllers\technican\reports\DashboardReportsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TechnicanController extends Controller
{
    public function index(){
        $myId = Auth::guard('web')->user()->id;
        $reportOpen = DashboardReportsController::getOpenRequestsReport($myId);
        $toDoList = DashboardReportsController::getToDoList($myId);
        $reportClosed = DashboardReportsController::getClosedRequestsReport($myId);
        $reportToTake  = DashboardReportsController::getRequestsToTaken();
        $myRequests = \App\Models\Request::where('id_technik',$myId)->where('status','in progress')->take(10)->get();
        return view('admin.home',[
            'requestsInfo' => $myRequests,
            'reportOpen' => $reportOpen,
            'reportClosed' => $reportClosed,
            'reportToTake' => $reportToTake,
            'toDoList'=>$toDoList,
        ]);
    }
    public function requests(){
        $requests = \App\Models\Request::orderBy('created_at','desc')->get();
        return view('admin.requests',['requestsInfo'=>$requests]);
    }
    public function admin(){
        $users = User::where('rola',1)->get();
        return view('admin.settingsUsers')->with([
            'users'=>$users,
        ]);
    }
    public function adminSettings(){
        $users = User::where('rola',2)->orwhere('rola',3)->get();
        return view('admin.settingsTechnican')->with([
            'users'=>$users,
        ]);
    }
    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('admin.editPerson',['user'=>$user,]);
    }
    public function editSubmit(Request $request){
        $request->validate([
            'imie'=>'required',
            'nazwisko'=>'required',
            'email'=>'email|required',
            'login'=>'required',
            'rola'=>'required',
        ]);
        try{
            User::where('id',$request->id)->update([
                'imie'=>$request->imie,
                'nazwisko'=>$request->nazwisko,
                'email'=>$request->email,
                'login'=>$request->login,
                'rola'=>$request->rola,
                'telefon'=>$request->telefon,
            ]);
            return redirect()->back()->with('success','Success edit person');
        }catch (\Exception $e){
            return redirect()->back()->with('error','Invalid save your profile');
        }

    }
    public function options(){
        return view('admin.options', ['user'=>Auth::guard('web')->user()]);
    }
    public function optionsSubmit(Request $request){
        $request->validate([
            'imie'=>'required',
            'nazwisko'=>'required',
            'email'=>'email|required',
            'login'=>'required',
        ]);
        try{
            if(isset($request->password)){
                $request->validate([
                    'oldPassword'=>'required',
                    'password'=>'required',
                    'retypePassword'=>'required| same:password',
                ]);
                $credential = [
                    'login'=>$request->login,
                    'password'=>$request->oldPassword,
                ];
                if(Auth::attempt($credential)){
                    User::where('id',$request->id)->update([
                        'imie'=>$request->imie,
                        'nazwisko'=>$request->nazwisko,
                        'email'=>$request->email,
                        'login'=>$request->login,
                        'telefon'=>$request->telefon,
                        'password'=>Hash::make($request->password),
                    ]);
                }else{
                    return redirect()->back()->with('error','Invalid old password');
                }
            }else{
                User::where('id',$request->id)->update([
                    'imie'=>$request->imie,
                    'nazwisko'=>$request->nazwisko,
                    'email'=>$request->email,
                    'login'=>$request->login,
                    'telefon'=>$request->telefon,
                ]);
            }

            return redirect()->back()->with('success','Success edit your profile');
        }catch (\Exception $e){
            return redirect()->back()->with('error','Invalid save your profile');
        }

    }
    public function viewFromLinkToAprove($idAprove, $token){
        $aprove = AproveController::getAprove($idAprove);
        return view('general.aprove')->with([
            'aprove'=>$aprove,
            'token'=>$token,
        ]);
    }

}

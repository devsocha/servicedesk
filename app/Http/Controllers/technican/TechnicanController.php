<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TechnicanController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function requests(){
        return view('admin.requests');
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

}

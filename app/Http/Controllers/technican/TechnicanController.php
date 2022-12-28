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

}

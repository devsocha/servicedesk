<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
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
        return view('admin.requests');
    }

}

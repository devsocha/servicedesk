<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('general.home')->with('categories',$categories);
    }
    public function forms($id){
        $forms = Form::where('id_categoria',$id)->get();
        return view('general.forms')->with('forms',$forms);
    }
    public function options(){
        return view('general.options', ['user'=>Auth::guard('web')->user()]);
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
                    'password'=>'required',
                    'retypePassword'=>'required| same:password',
                ]);
                User::where('id',$request->id)->update([
                    'imie'=>$request->imie,
                    'nazwisko'=>$request->nazwisko,
                    'email'=>$request->email,
                    'login'=>$request->login,
                    'telefon'=>$request->telefon,
                    'password'=>Hash::make($request->password),
                ]);
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
}

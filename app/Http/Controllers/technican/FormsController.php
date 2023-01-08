<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index(){
        $forms = Form::all();
        $categories = Category::all();
        return view('admin.forms')->with([
            'categories'=>$categories,
            'forms'=>$forms,
            ]);

    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category'=>'required'
        ]);
        $check = Form::where('name',$request->name)->where('id_categoria',$request->category)->exists();
        if($check){
            return redirect()->back()->with('error','Form exist');
        }else{
            if($request->hasFile('photo')){
                $request->validate([
                    'photo'=>'required|image| mimes: jpeg,jpg,png',
                ]);
                $ext = $request->file('photo')->extension();
                $final = $request->name . '_form'.'.'.$ext;
                $request->file('photo')->move(public_path('uploads/photos/icons/'),$final);
                Form::create([
                    'name'=>$request->name,
                    'id_categoria'=>$request->category,
                    'photo'=>$final,
                ]);
            }else{
                Form::create([
                    'name'=>$request->name,
                    'id_categoria'=>$request->category,
                    'photo'=>'category.png',
                ]);
            }
            return redirect()->back()->with('success','Form added success');
        }
    }

    public function destroy($id){
        try{
            Form::where('id',$id)->delete();
            return redirect()->back()->with('success','Form deleted success');
        }catch (\Exception $e){
            return redirect()->back()->with('error','Form deleted error');
        }
    }
}

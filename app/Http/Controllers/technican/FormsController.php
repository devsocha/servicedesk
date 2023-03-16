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
        if(Category::exists()){
            $isOrNo = true;
        }else{
            $isOrNo = false;
        }
        return view('admin.forms')->with([
            'categories'=>$categories,
            'forms'=>$forms,
            'isOrNo'=>$isOrNo,
            ]);

    }
    public function deleteTask($id){
        try{
            TaskController::deleteTasks($id);
            return redirect()->back()->with(['success'=>'Task deleted']);
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Error']);
        }
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
    public function edit($id){
        $form = Form::where('id',$id)->first();
        $tasks = TaskController::getTasks($id);
        return view('admin.formsEdit',[
            'form'=>$form,
            'tasks'=>$tasks,
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        if($request->hasFile('photo')){
            $request->validate([
                'photo'=>'required|image|mimes:jpg,png,jpeg',
            ]);
            $ext = $request->file('photo')->extension();
            $final = $request->name . '_form'.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/photos/icons/'),$final);
            Form::where('id',$request->id)->update([
                'name' => $request->name,
                'photo'=>$final,
            ]);
        }else{
            Form::where('id',$request->id)->update([
                'name' => $request->name,
            ]);
        }
        return redirect()->back()->with('success','Form updated success');
    }

}

<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $check = Category::where('name',$request->name)->exists();
        if($check){
            return redirect()->back()->with('error','Category exist');
        }else{
            if($request->hasFile('photo')){
                $request->validate([
                    'photo'=>'required|image| mimes: jpeg,jpg,png',
                ]);
                $ext = $request->file('photo')->extension();
                $final = $request->name . '_category'.'.'.$ext;
                $request->file('photo')->move(public_path('uploads/photos/icons/'),$final);
                Category::create([
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'photo'=>$final,
                ]);
            }else{
                Category::create([
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'photo'=>'default.jpg',
                ]);
            }
            return redirect()->back()->with('success','Category added success');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','Category id: '.$id.' success deleted ');
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $requests = \App\Models\Request::all();
            $data = [
                'status'=>200,
                'requests' => $requests,
            ];
            return response()->json($data);
        }catch (\Exception $e){
            $data = [
                'status'=>400,
                'requests' => null,
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'file'=>'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if($request->hasFile('file')){
                $ext = $request->file('file')->extension();
                $fullName = $request->id_user.hash('sha256',time()).'.'.$ext;
                $request->file('file')->move(public_path('/uploads/requests/'),$fullName);
                $request = \App\Models\Request::create([
                    'filename'=>$fullName,
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_user'=> 0 ,
                    'form_id'=>0,
                ]);
            }else{
               $request =  \App\Models\Request::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_user'=>0,
                    'form_id'=> 0,
                ]);
            }
            $data = [
                'status'=>200,
                'request'=>$request,
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'status'=>'400',
            ];
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $request = \App\Models\Request::where('id',$id)->first();
            $data = [
                'status'=>200,
                'request'=>$request,
            ];
            return response()->json($data);
        }catch (\Exception $e){
            $data = [
                'status'=>400,
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

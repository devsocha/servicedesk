<?php

namespace App\Http\Controllers\technican;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    public function upgradePermissions(Request $request){
        User::where('email',$request->email)->update([
            'rola'=>2,
        ]);
        return redirect()->back()->with('success','Podniesiono uprawnienia');
    }
}

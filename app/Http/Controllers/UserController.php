<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.Profile.index');
    }


    protected function infoChange(Request $request){
        $request->validate([
            'fisrt_name' => ['nullable','string', 'max:255'],
            'last_name' => ['nullable','string', 'max:255'],
            'phone' => ['nullable','string', 'max:255'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable','string', 'min:8'],
        ]);

        if($request->password){
            $pass=Hash::make($request->password);
            User::where('id',auth()->user()->id)->update([
                'password'=>$pass
            ]);
        }
        if($request->email){
            User::where('id',auth()->user()->id)->update([
                'email'=>$request->email
            ]);
        }
        if($request->first_name){
            User::where('id',auth()->user()->id)->update([
                'first_name'=>$request->first_name
            ]);
        }
        if($request->last_name){
            User::where('id',auth()->user()->id)->update([
                'last_name'=>$request->last_name
            ]);
        }
        if($request->phone){
            User::where('id',auth()->user()->id)->update([
                'phone'=>$request->phone
            ]);
        }

        return back()->with('success', 'Info updated');

    }
}

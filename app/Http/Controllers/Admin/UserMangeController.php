<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserMangeController extends Controller
{
    public function index(){
        return view('admin.user.index',[
            'users' => User::latest()->paginate(15)
        ]);
    }

    public function unverifyUser(){
        $unverify_users = User::where('email_verified_at', Null)->paginate(15);
        return view('admin.user.unverify_user',compact('unverify_users'));
    }

    public function edit(User $user){
        return view('admin.user.edit',compact('user'));  
    }

    public function update(Request $request,User $user){
        $request->validate([
            'password' => 'required| min:8| max:15 |confirmed',
            'password_confirmation' => 'required| min:8'
        ]);
        $input = $request->except(['password','password_confirmation']);
        
        $newpass = $request->password;
        $confirm = $request->password_confirmation;

        if($newpass === $confirm){
            $input['password'] = Hash::make($newpass);
        }
        $user->update($input);
        Auth::logout();  

        return back()->with('message','User Information Changed Successfully ');
    }
  
}

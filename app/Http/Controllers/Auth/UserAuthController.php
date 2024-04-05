<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller{

    // Login start here
    public function user_login(){
        if(Auth::check()){
            return redirect()->route('tickets');
        }
       
        return view('users/user_login');
    }

    public function login_process(Request $request){
        $postData = $request->all();
        
        if(Auth::attempt(['email'=>$postData['email'],'password'=>$postData['password']])){
            $user = User::where('email',$postData['email'])->first();
            Auth::login($user);
            return redirect()->route('tickets');
        }else{
            return back()->withMessage('invalid Credentials');
        }
    }

    // User registration start here
    public function user_register(){
        return view('users/user_register');
    }
    
    public function register_process(Request $request){

        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);
        
        $postData = $request->all();

        $user = new User;
        $user->username = $postData['username'];
        $user->email = $postData['email'];
        $user->password = $postData['password'];
        $user->role = $postData['role'];
        $user->save();

        return redirect()
        ->route('user.register')
        ->withMessage('Registered Successfully');
    }
   
    // logout
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }

    
}

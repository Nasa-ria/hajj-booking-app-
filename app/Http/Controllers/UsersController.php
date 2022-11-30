<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
   
 
    public function index()
    {
        return view('auth.signin');
    }  
       
 
    public function customLogin(Request $request)
    {
        // dd($request ->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    //  dd($request ->all());
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
   
        return redirect("/signin")->withSuccess('Login details are not valid');
    }
 
 
 
    public function signup()
    {
        return view('auth.signup');
    }
       
 
    public function customSignUp(Request $request)
    {  
        //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'agent' => '',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("/")->withSuccess('have signed-in');
    }
 
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        // 'agent' => $data['agent']

      ]);
    }    
     
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('/');
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('/signin');
    }

}

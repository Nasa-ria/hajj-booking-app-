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
            
        // $data = $request->all();
       
        $user= new User();
        $user-> name    = $request->input('name');
        $user-> email    = $request->input('email');
        $user-> password    =  Hash::make('password');
        $user->agent= $request->has('agent');

       $user->save();

        // $check = $this->create($data);
          
        return redirect("/")->withSuccess('have signed-in');
    }
 
 
    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password']),
    //     'agent' => $data['agent']

    //   ]);
    // }    
     
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('/');
        }else if(Auth:: check()&& Auth::user()->agent == '1'){
            return redirect("profile");
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('/signin');
    }

}

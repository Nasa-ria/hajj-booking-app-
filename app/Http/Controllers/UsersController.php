<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Comment;
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

            $agents = auth()->user() && Auth::user()->agent == "1";

            if($agents){
                $user = auth()->user();
                $email = $user-> email ;
                if($email){
                  $files=Agent::where('email','=',$email)->get();
                //   if($files){
                //     $id = $files-> id ;
                //     $comments=Comment::where('agent_id','=',$id)->get();
                //   }
                // //dd("yeeeee");
                return view('auth.profile',['files'=>$files]);

                }
            }

            return redirect()->intended('/')
                        ->withSuccess('Signed in');
            }
        // $agents = Auth::user()->agent == "1";

        // dd($agents);

        // if(Auth::user()->agent == '1'){
        //     dd("yes");
        //     // return view('/profile');
        // }else if(Auth:: check()){
        //     return view("/");
        // }
   
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
        if(Auth:: check()){
            return view("/");
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('/signin');
    }


    public function  profile() {
        $user = auth()->user();
        // dd($user);
       $email = $user-> email ;
       if($email){
         $files=Agent::where('email','=',$email)->get();
        //  $books=Book::where('email','=',$email)->get();
 
         //dd("files");
         return view('Auth.profile',compact('files'));
  
       }
     } 
}

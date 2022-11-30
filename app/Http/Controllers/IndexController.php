<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Agent;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserCollection;
use App\Http\Resources\AgentCollection;

class IndexController extends Controller
{
    public function index() {
        $agents=Agent::all();
        // return view('pages.index');
        return view('pages.index',['agents'=>$agents]);
    }
    
 
    public function  form() {
        return view('pages.agentform');
    }
    
    
    public function  signup() {
        return view('pages.signup');
    }
   
    public function  signin() {
        return view('pages.signin');
    } 
    public function  book() {
        return view('pages.book');
    } 

    public function  singlepost( Request $request ,$id) 
    {
     
        $agent = Agent::find($id);
 
        $comments = Comment::where('agent_id', '=', $id)->get();  
        return view('pages.singlepost',compact('agent','comments'));
    }

    public function storebookings(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'book_date'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'location'=>'required',
        ]);
     
        $booking = new Book;
        $booking-> name   = $request->input('name');
        $booking-> book_date  = $request->input('book_date');
        $booking-> location = $request->input('location');
        $booking-> email = $request->input('email');
        $booking-> contact  = $request->input('contact');
        $booking->save();
        return redirect('/')->with('success','Booking was Successfully');
    }

    //    add feild to the agent email 
    // then u compare the emails then u fetch it
    public function  profile() {
       $user = auth()->user();
    //    return($user);
    //   $agent = $user-> agent == '1';
      $email = $user-> email ;
      if($email){
        $files=Agent::where('email','=',$email)->get();
    //     // $profile=DB::table('agents')->where('agent_id',$user->id)-get();
    //     // return $file;
        return view('pages.profile',['files'=>$files]);
    //   }else{
    //     return " not profile has being created yet";
      }
    } 
 
 }
    


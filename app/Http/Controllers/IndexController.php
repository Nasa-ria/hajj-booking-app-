<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Agent;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    public function  book(Request $request ,$id) {
        $agent = Agent::find($id);
        return view('pages.book',['agent'=>$agent]);
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
            'agent_id'=>'required',
            
        ]);
     
        $booking = new Book;
        $booking-> name   = $request->input('name');
        $booking-> book_date  = $request->input('book_date');
        $booking-> location = $request->input('location');
        $booking-> email = $request->input('email');
        $booking-> contact  = $request->input('contact');
        $booking-> agent_id  = $request->input('agent_id');
        $booking->save();
        return redirect('/')->with('success','Booking was Successfully');
    }

 
    public function  bookFile() {
        $user = auth()->user();
       $email = $user-> email ;
       if($email){
         $files=Book::where('email','=',$email)->get();
  
         return view('pages.profile',compact('files','comments'));
  
       }
     } 


      public function delete(Request $request , $id){
        // $agent = Agent::find($id);
        // $imagesArr = json_decode($agent->images);
        dd($request->all());
    //     foreach ($request->file('images') as $image){ 
    //     DB::table("images")->whereIn('',explode("image",$image))->delete();
    //     }
    //     return redirect('/profile')->with('success','image was Successfully');
      }

        public function comment(){

        }

 }
    


<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Resources\AgentResource;
use App\Http\Resources\AgentCollection;
use Illuminate\Support\Facades\Storage;

// controller fro the agentform created it using php artisan make:nameof controller ---resouce
class AgentController extends Controller
{ 


     function dump($data){
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'description' => $data['description'],
            'location' => $data['location'],
            // 'profile' => $data['profile'],
            // 'images' => json_encode($data['images']),
    
        ];
        }
    
    

    public function index()    {
        //  return Agent::a9ll();
        $agent = Agent::all();

        //dd($agent);

        return new AgentCollection($agent);
        // return view('pages.index',compact('agents'));
    } 

    public function create()
    {   
        return view('pages.agentform');
    }

    public function store(Request $request)
    {

         //return 'hellooo';
    //   dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'profile'=>'required|mimes:jpg,jpeg,png,avif',
            'location'=>'required',
            'images'=>'required|array',
            'description'=>'required'
        ]);

        // inserting a single image
         $profile = $request->file('profile')->getClientOriginalName();
         $path = $request->file('profile')->storeAs('public/images/agents/profile', $profile);
       
        // uploading multiple images . need to loop through
        $img_data = [];
        foreach ($request->file('images') as $image){ 
         $imagePath = Storage::putFile('public/images/agents/trips', $image, 'public');
         $imgName= Str::afterlast($imagePath ,'trips/');
         $img_data[] = $imgName; 
        }
        
        $agent = new Agent();
        $agent-> name    = $request->input('name');
        $agent-> email   = $request->input('email');
        $agent-> location = $request->input('location');
        $agent-> contact  = $request->input('contact');
        $agent-> address  = $request->input('address');
        $agent-> profile  = $profile;
        $agent-> images   = json_encode($img_data);
        $agent->description= $request->input('description');
        $agent->save();

        // return  new AgentResource($agent);

        // dd($namee);
        return redirect('/')->with('success','Post Created Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('pages.edit')->with('agent',$agent);
    }

    public function update(Request $request, $id)
    {
       $data= $request->all();
    //    return  $data;            
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'profile'=>'nullable|mimes:jpg,jpeg,png,avif',
            'location'=>'required',
            'images'=>'nullable|array',
            'description'=>'required'
        ]);


        $agent = Agent::find($id);
        if($request->hasFile('profile')){
            
            if (File::exists('storage/images/agents/profile/'.$agent->profile)){
                File::delete('storage/images/agents/profile/'.$agent->profile);
                
                
            }
            $profile_img = $request->file('profile')->getClientOriginalName();
             $profile= $request->file('profile')->storeAs('public/images/agents/profile',$profile_img);
             $data['profile'] =$profile_img;
        }                              

          $agent->update($this->dump( $data));

        return redirect()->route('singlepost', ['id'=>$id])->with('success','Post updated Successfully');
    }

    public function destroy(Request $request,$id)
    {
        $agent = Agent::find($id);
        $imagesArr = json_decode($agent->images);
        dd($request->all());
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        //  $comment = new CommentCollection($this->Comment);

         //dd($comment);
        // $comments = Comment::all();
        return [
            'name' => $this->name,   
            'email' => $this->email,   
            'description' =>  $this->description,    
            'contact' => $this->contact, 
            'address' =>  $this->address,   
             'profile' =>  $this->profile, 
            'images' =>  $this->images,
            // 'Comment' => $this->comments,
           

        ];
    }
}

<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    protected $fillable =
    [
        'author',
        'comment'
        

    ];
    public function Comment()
{
    return $this->belongsTo(Agent::class,'agent_id','id');
    // return $this->hasOne( 
    //     'Agent', 'agent_id', 
    // );
}
   
}

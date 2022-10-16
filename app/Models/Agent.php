<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable =
    [
        'name',
        'address',
        'profile',
        'images',
        'email',
        'location'

    ];


public function Agent()
{
    return $this->hasMany(Comment::class);
}

}
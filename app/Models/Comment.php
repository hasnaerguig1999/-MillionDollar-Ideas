<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Comment extends Model
{
  
    public function likeCount()
    {
        return $this->likes->count();
    }
    
   
    protected $fillable = [
        'body',
        'post_id',
        'user_id'
        
    ];
    use HasFactory;
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

 
    public function likes()
{
    return $this->hasMany(Like::class);
}

    

    
}
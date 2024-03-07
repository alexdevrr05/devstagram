<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
        'user_id',
        'post_id',
    ];

    // Un comentario solo puede pertenecer a un usuario
    public function user() {
        return $this->belongsTo(User::class)->select(['name', 'username']);    
    }
    
    // Un comentario solo puede pertenecer a un post
    public function post() {
        // return $this->belongsTo(Post::class)->select(['name', 'username']);    
        return $this->belongsTo(Post::class);
    }
}

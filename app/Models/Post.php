<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     /** es como el whitelist: true de NestJS */ 
    protected $fillable = [
        'titulo', 
        'descripcion', 
        'imagen', 
        'user_id'
    ];
}

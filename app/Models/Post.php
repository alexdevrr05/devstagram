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

    // relación: Pertenece A (inversa)
    // Un post solo puede tener un usuario
    public function user() {
        // Belongs To
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    // Un post puede tener muchos comentarios
    public function comentarios() {
        return $this->hasMany(Comentario::class);
    } 

    // Un post puede tener muchos likes
    public function likes() {
        return $this->hasMany(Like::class);
    }

    // Verificar si un usuario ya dio like
    public function checkLike(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }
}

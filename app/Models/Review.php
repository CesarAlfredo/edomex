<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'review',
        'imagen',
        'user_id'
    ];

    // una relacion inversa belongs to, un usuario a un user

    public function user(){

        return $this->belongsTo(User::class)->select(['name','username']);

    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
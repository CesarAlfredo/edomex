<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Review $review){
        
        $this->validate($request,[
            'comentario' => 'required|max:255'

        ]);

        Comentario::create([
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
            'comentario' => $request->comentario
        ]);


        return back()->with('mensaje','Comentario Enviado...');
    }
}

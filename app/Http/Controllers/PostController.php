<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Esta funcion se ejecuta cuando es instanciado el controlador, se proteje con middleware
    //se ejecuta antes que index, y revisa autenticacion

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }
    public function index(User $user)
    {
            $reviews = Review::where('user_id', $user->id)->paginate(2);

        return view('layouts/dashboard',[
            'user'=>$user,
            'reviews'=> $reviews
        ]);
    }
    public function create(){
        return view('review.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'titulo' => 'required|max:250',
            'review' => 'required',
            'imagen' => 'required'
        ]);


        Review::create([
            'titulo' => $request->titulo,
            'review' => $request->review,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);

    }

    public function show(User $user, Review $review)
    {
        return view('review.show',[
            'review' => $review,
            'user' => $user
        ]);
    }

    public function destroy(Review $review){

        $this->authorize('delete', $review);
        $review->delete();
        return redirect()->route('posts.index', auth()->user()->username);
    }

}


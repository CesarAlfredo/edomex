<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (){
        return view('auth.login');
    }

    public function store(Request $request){

 

        //es como console log en javascript, asegurar que endpoints se registren correctament
        //luego seguir llenando la funcion       
        //dd('Verificando datos...');
        $this->validate($request, [
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        

        //Si el usuario no se puede autenticar 
        // ese back () whit ,, se crea el mensaje y se puede consumir en la vista, alli en la vista se da formato 
        if(!auth()->attempt($request->only('email','password'))){
           // return back()->whit('mensaje','Datos incorrectos');
           return back()->with('Mensaje','Datos incorrectos');
        }

        return redirect()->route('posts.index', auth()->user()->username);

    }
}

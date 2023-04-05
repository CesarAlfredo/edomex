<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }
    public function store (Request $request){

        //mostrar toda la info
         //dd($request);
        //mostrar algo en especifico
        //dd($request->get('sexo'));
        //modificar el request como ultimo recurso
        $request->request->add(['username' => Str::slug($request->username)]);


        // validaciones
        $this->validate($request,[
            'name'=> 'required|min:7',
            'username'=> 'required|min:2|unique:users',
            'age' => 'required',
            'sexo' =>'required',
            'email'=> 'required|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $request->name,
            //minusculas para evitar problemas con url Str y quita los espacios en blanco
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email','password'));
        
        return redirect()->route('posts.index', auth()->user()->username);
        
    }
}

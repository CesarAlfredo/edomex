@extends('layouts.app')

@section('Titulo')
Inicia Sesion
@endsection

@section('contenido')
Ingrese sus datos:
<div class="md:flex md:gap-5 md:items-center">
    <div class=" p-5">
    <img src="{{ asset ('img/foto1.jpg') }}" alt="Imagen de
    login usuario">
    </div>

    
    <div class="md:w-1/2 bg-orange-50 p-10 rounded-lg shadow-xl">
        <form method="POST" action="{{ route('login') }}" novalidate>
         @csrf 

         @if(session('Mensaje'))
         <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
            {{ session('Mensaje') }}
         </p>
         @endif

        <div class="mb-5">
         <label for="email" class=" uppercase text-gray-600 font-bold ">Email</label>
            <input type="email" name="email" id="email" placeholder="Ingrese su correo electronico" class="border  w-full rounded-lg
             @error('email') border-red-500       
             @enderror"  
             value="{{ old ('email') }}">
             <br>
             @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

        <div class="mb-5">
         <label for="password" class=" uppercase text-gray-600 font-bold ">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="8 digitos+mayusculas y minusculas+simbolos" class="border  w-full rounded-lg
             @error('password') border-red-500       
             @enderror"  
             >
             <br>
             @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

        <div class="mb-5"> 
               <input type="checkbox" name="remember">
               <label class=" text-gray-600 text-sm">
               Mantener sesion abierta</label>  
        </div>


        <input type="submit" value="Iniciar Sesion" class="bg-orange-600 hover:bg-orange-700 transition-colors cursor-pointer
        upper-case font-bold w-full p-3 text-black rounded-lg" >

        </form>
    </div>             
</div>
@endsection
                

        
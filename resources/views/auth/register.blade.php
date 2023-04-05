@extends('layouts.app')

@section('Titulo')
Registrate
@endsection

@section('contenido')
Ingrese sus datos:
<div class="md:flex md:gap-5 md:items-center">
    <div class=" p-5">
    <img src="{{ asset ('img/foto2.jpg') }}" alt="Imagen de
    registro usuario">
    </div>

    
    <div class="md:w-1/2 bg-orange-50 p-10 rounded-lg shadow-xl">
        <form action="{{route ('register')}}" method="POST">
         @csrf 
        <div class="mb-5">
         <label for="name" class=" uppercase text-gray-600 font-bold ">Nombre Completo</label>
            <input type="text"
             name="name"
             id="name" 
             placeholder="Ingrese su nombre completo" 
             class="border  w-full rounded-lg @error('name') border-red-500       
             @enderror"  
             value="{{ old ('name') }}"
             />
             
             
             @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

        <div class="mb-5">
         <label for="username" class=" uppercase text-gray-600 font-bold ">Ingrese su Alias</label>
            <input type="text"
             name="username"
             id="name" 
             placeholder="Ingrese su Alias" 
             class="border  w-full rounded-lg @error('name') border-red-500       
             @enderror"  
             value="{{ old ('username') }}"
             />
                          
             @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

        <div class="mb-5">
         <label for="age" class=" uppercase text-gray-600 font-bold ">Edad</label>
            <input type="text" name="age" id="age" placeholder="Ingrese su edad" class="border  w-full rounded-lg
             @error('age') border-red-500       
             @enderror"  
             value="{{ old ('age') }}">
             <br>
             @error('age')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

        <div class="mb-5">
         <label for="sex" class=" uppercase text-gray-600 font-bold ">Sexo</label>
            <input type="text" name="sexo" id="sex" placeholder="(H)hombre(M)mujer(N)NoEspecificar" class="border  w-full rounded-lg 
            @error('sexo') border-red-500       
             @enderror"  
             value="{{ old ('sexo') }}">
             <br>
             @error('sexo')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

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
         <label for="password_confirmation" class=" mb-2 block uppercase text-gray-600 font-bold ">Confirme su contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirme su contraseña" class="border  w-full rounded-lg 
            @error('password_confirmation') border-red-500       
             @enderror"  
             >
             <br>
             @error('password_confirmation')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
        </div>

        <input type="submit" value="Crear cuenta" class="bg-orange-600 hover:bg-orange-700 transition-colors cursor-pointer
        upper-case font-bold w-full p-3 text-black rounded-lg" >

        </form>
    </div>             
</div>
@endsection
                

        



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>NyCEdo.Mex</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    
         
        <nav class="flex gap-4 bg-orange-700 justify-end ">

        @auth
        <a class=" flex items-center gap-2 bg-orange-600 border p-2 font-bold uppercase text-right-600 text-sm text-gray-900 first-letter:
            cursor pointer" 
            href="{{route('reviews.create')}}"
            >

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                
            </svg>
                        
            
            Crear Reseña</a>
            
        <a class=" flex items-center gap-2 bg-orange-600 border p-2 font-bold uppercase text-right-600 text-sm text-gray-900 first-letter:
            cursor pointer " href="{{route('posts.index',  auth()->user()->username )}}">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002" />
            </svg>

            MI PERFIL: <span class="font-normal text-gray-900 ">
                 {{auth()->user()->username}}
            </span>
        </a>

        <form class=" flex gap-4 "method="POST" action="{{ route('logout')}}">
            @csrf
            <button type="submit" class=" flex items-center gap-2 bg-orange-600 border p-2 font-bold uppercase text-right-600 text-sm text-gray-900 first-letter:
            cursor pointer " href="#">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
                Cerrar Sesion
            </button>
        </form>
        @endauth

        @guest
        <a class="font-bold uppercase text-right-600 text-sm" href="/">Inicio</a>
        <a  class="font-bold uppercase text-right-600 text-sm" href="/login">Ingresar</a>
        <a href="{{ route('register') }}" class="font-bold uppercase text-right-600 text-sm" href="/register">Crear Cuenta</a>
        @endguest
        </nav>

    <body class=" bg-gray-100">
        <header class="p-3 border-b bg-orange-600 shadow">
            <div class="container mx-auto flex justify-between 
             item-center">
                <h1 class="text-3xl font-extrabold">
                    @yield('Titulo')   
                </h1>   
            </div>
        </header>

        
        <main >
            <h2 class="font-black text-center text-2xl mb-10">
            @yield('contenido')
            </h2>
        </main>

        <footer class="text-center  text-gray-500 font-bold uppercase">

         Cesar Olvera (TSU). {{now ()}}

        </footer>


    </body>
</html>

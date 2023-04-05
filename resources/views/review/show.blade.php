@extends('layouts.app')

@section('Titulo')

{{$review->titulo}}

@endsection

@section('contenido')
<div class="container mx-auto flex">
    <div class="md:w-1/2">
        <img src="{{asset('uploads'). '/' . $review->imagen }}" alt="imagen de reseña {{ $review->titulo}}">
        <div class="p-3">
            <p>0 likes </p>
        </div>
        <div>
            <p class="font-bold text-red-400">Autor: {{ $review->user->username }}</p>
            <p class="text-sm text-gray-500">
                {{$review->created_at->diffForHumans()}}
            </p>
            <p class="mt-8">
                {{$review->review}}
            </p>
        </div>

        @auth
        @if ($review->user_id === auth()->user()->id)
        <form  method="POST"action="{{route('review.destroy', $review)}}">
            @method('DELETE')            
            @csrf
                <input type="submit" value="Eliminar Reseña" class="bg-red-600 hover:bg-red-700 p-2 rounden text-white font-bold mt-4
                    cursor-pointer" />
        </form>
        @endif
        @endauth

    </div>
    <div class="md:w-1/2 p-5">

        <div class="shadow bg-white p-5 mb-5">

            @auth
            @if (session('mensaje'))
            <div class="bg-black-200 p-2 rounded-lg nb-6 text-white">
                {{session('mensaje')}}
            </div>
            @endif


            <form action="{{ route('comentarios.store', ['review' => $review,'user'=> $user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="  text-gray-600 font-bold ">
                        Escriba su comentario
                    </label>
                    <textarea name="comentario" id="comentario" placeholder="Ingrese su comentario: " class="border  w-full rounded-lg @error('name') border-red-500       
                        @enderror"></textarea>

                    @error('comentario')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror

                    <input type="submit" value="publicar comentario" class="bg-orange-600 hover:bg-orange-700 transition-colors cursor-pointer
                    upper-case font-bold  p-4 text-black rounded-lg " />
                </div>
            </form>
            @endauth

            <div class="bg-orange shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if($review->comentarios->count())
                <p class="text-lg text-center text-orange-800">Los comentarios a tu reseña:</p>
                @foreach ( $review->comentarios as $comentario )
                <div class="p-5 border-gray-300 border-b">
                    <a href="{{route('posts.index', $comentario->user)}}">

                        <p>{{$comentario->user->username}} dice:</p>
                    </a>
                    <p class="text-left">{{ $comentario->comentario}}</p>
                    <p class="text-sm text-gray-400 text-end">{{ $comentario->created_at->diffForHumans()}}</p>
                </div>
                @endforeach

                @else
                <p class="p-10 text-center">Agrega un primer comentario</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
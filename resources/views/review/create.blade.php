@extends('layouts.app')

@section('Titulo')
Hola 
@endsection

@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{route('userimagen.store')}}" method="post" enctype="multipart/
        form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounden flex flex-col justify-center items-center">
        @csrf
        </form>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush

    

    <div class="md:w-1/2 px-10 bg-white rounded-lg shadow-lg mt-10 md:mt-0">
        <form action="{{route ('review.store')}}" method="POST">
         @csrf 
            <div class="mb-5">
                 <label for="titulo" class=" uppercase text-gray-600 font-bold ">Escriba el nombre del destino</label>
                    <input type="text"
                        name="titulo"
                        id="titulo" 
                        placeholder="Ingrese el nombre de el destino: " 
                        class="border  w-full rounded-lg @error('name') border-red-500       
                        @enderror"  
                        value="{{ old ('titulo') }}"
                        />
                         @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                         @enderror
             </div>

             <div class="mb-5">
                 <label for="review" class=" uppercase text-gray-600 font-bold ">
                    Escriba su reseña
                 </label>
                    <textarea 
                        name="review"
                        id="review" 
                        placeholder="Ingrese su reseña: " 
                        class="border  w-full rounded-lg @error('name') border-red-500       
                        @enderror"  
                        
                    >{{ old ('review') }}</textarea>

                         @error('review')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                         @enderror
             </div>

             <div class="mb-5">
                <input
                    name="imagen"
                    type="hidden"
                    value="{{ old ('imagen') }}"
                />
            @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
             @enderror
             </div>



        <input type="submit" 
               value="Publicar Reseña" 
               class="bg-orange-600 hover:bg-orange-700 transition-colors cursor-pointer
               upper-case font-bold  p-4 text-black rounded-lg " />


                


        </form>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('titulo')
    Editar Perfil:{{ auth()->user()->username }}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}"  method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                {{-- Cambio de username --}}
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg 
                @error('username')
                         border-red-500
                @enderror"
                        value={{ auth()->user()->username }}>
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Cambio de correo --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nuevo Email
                    </label>
                    <input id="email" name="email" type="text" placeholder="Ingresar Nuevo Correo"
                        class="border p-3 w-full rounded-lg 
                @error('email')
                         border-red-500
                @enderror"
                        value={{ auth()->user()->email }}>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                 {{-- Error al meter password --}}
                 @if (session('mensaje'))
                 <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                 @endif
                {{-- Cambio de contraseña --}}
                <div class="mb-5">
                   
                    <label class="flex" for="old_password" class="mb-2 block uppercase text-gray-500 font-bold">
                       Contraseña <p class="text-sm font-bold text-red-600 uppercase">*</p>
                    </label>
                    <input id="old_password" name="old_password" type="password" placeholder="Ingresar contraseña actual"
                        class="border p-3 w-full rounded-lg 
                @error('old_password')
                         border-red-500
                @enderror"
                        value="">
                    @error('old_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

               <div class="border p-2 rounded">
                <p class="text-sm font-bold text-blue-600 uppercase">opcional</p>
                <div class="mb-5">
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">
                       Nueva Contraseña
                    </label>
                    <input id="new_password" name="new_password" type="password" placeholder="Ingresar Nueva Contraseña"
                        class="border p-3 w-full rounded-lg 
                @error('new_password')
                         border-red-500
                @enderror"
                        value="">
                    @error('new_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="confirm_password" class="mb-2 block uppercase text-gray-500 font-bold">
                       Confirmar Contraseña
                    </label>
                    <input id="confirm_password" name="confirm_password" type="password" placeholder="Ingresar Nueva Contraseña"
                        class="border p-3 w-full rounded-lg 
                @error('confirm_password')
                         border-red-500
                @enderror"
                        value="">
                    @error('confirm_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
               </div>


                {{-- imagen perfil --}}
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen perfil
                    </label>
                    <input id="imagen" name="imagen" type="file" placeholder="Tu Nombre de Usuario"
                        accept=".jpg, .jpeg .png" class="border p-3 w-full rounded-lg" value="" />
                </div>
                {{-- Boton guardar cambios --}}
                <input type="submit" value="Guardar Cambios"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

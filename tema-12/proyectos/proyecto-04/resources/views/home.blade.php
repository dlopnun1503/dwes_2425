{{-- Indico la plantilla a partir de la cual se genera la vista--}}
@extends('layouts.layout')

{{--modifico el titulo --}}
@section('titulo', 'Panel de control de productos 1.0')

{{--modifico el subtitulo --}}
@section('subtitulo', 'Tema 12 - Laravel - Generación de vistas con Blade') 

{{-- muestro todos los productos --}}
@section('contenido') 
    <!-- mostrar imagen  -->
        <div class="text-center">
            <img src="{!! asset('images/img1.png') !!}" class="img-fluid img thumbnail" alt="..." width="10%">
        </div>

    <!-- mostrar texto principal  -->
     <div class="h-100 p-5 bg-light border rounded-3">
        <h2>Panel de control de productos</h2>
        <p>Desde aquí podrás gestionar los productos de la tienda.</p>
    </div>
@endsection
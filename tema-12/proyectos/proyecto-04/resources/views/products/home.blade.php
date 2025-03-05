{{-- Indico la plantilla a partir de la cual se genera la vista--}}
@extends('layouts.layout')

{{--modifico el titulo --}}
@section('titulo', 'Panel de control de productos')

{{--modifico el subtitulo --}}
@section('subtitulo', 'Tema 12 - Laravel - Generación de vistas con Blade') 

{{--modifico el contenido --}}
@section('contenido')
    <div class="row">
        <div class="col-12">
            <h2>Panel de control de productos</h2>
            <p>Desde aquí podrás gestionar los productos de la tienda.</p>
        </div>
    </div>

{{-- muestro todos los productos --}}
@section('contenido')

@endsection
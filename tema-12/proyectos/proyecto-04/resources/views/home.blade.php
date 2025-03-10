{{-- - indico la plantilla a partir de la cual se genera la vista --}}
@extends('layout.layout')
{{-- modifico el titulo --}}
@section('titulo', 'Gestion de Productos 1.0')
{{-- modifico el subtitulo --}} 
@section('subtitulo', 'Tema 12 - Laravel - Generacion de vistas con blade')
{{-- modifico el contenido --}}
@section('contenido')
    

<!-- Estilo card de bootstrap -->
<div class="card">
			<div class="card-header">
				MVC
			</div>
			<div class="card-body">
            <!-- Titulos y subtitulos -->
                <dddiv class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-7">Gestión de Productos</h1>
                        <p class="lead">Tema 12 - Laravel 24/25</p>
                        <p>Hola Mundo</p>
                    </div>
        </div>
			<div class="card-footer">
				Curso 24/25
			</div>
		</div>

@endsection

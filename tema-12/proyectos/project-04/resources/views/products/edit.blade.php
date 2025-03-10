@extends('layout.layout')
@section('titulo', 'Editar Producto')

@section('contenido')
    @include('products.partials.menu')

    <form action="{{ route('products.update', $product['id']) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $product['descripcion'] }}">
        </div>
        
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $product['modelo'] }}">
        </div>
        
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $product['precio'] }}">
        </div>
        
        <div class="mb-3">
            <label for="unidades" class="form-label">Unidades</label>
            <input type="number" class="form-control" id="unidades" name="unidades" value="{{ $product['unidades'] }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

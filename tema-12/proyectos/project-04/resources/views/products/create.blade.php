@extends('layout.layout')
@section('titulo', 'Crear Nuevo Producto')

@section('contenido')
    @include('products.partials.menu')

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="0">Portátiles</option>
                <option value="1">PCs Sobremesa</option>
                <option value="2">Componentes</option>
                <option value="3">Monitores/TV</option>
                <option value="4">Impresoras</option>
                <option value="5">Tablets</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        
        <div class="mb-3">
            <label for="unidades" class="form-label">Unidades</label>
            <input type="number" class="form-control" id="unidades" name="unidades" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Producto</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

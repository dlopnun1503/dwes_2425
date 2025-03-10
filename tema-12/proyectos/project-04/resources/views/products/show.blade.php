@extends('layout.layout')
@section('titulo', 'Detalles del Producto')

@section('contenido')
    @include('products.partials.menu')

    <div class="container">
        <br><br><br><br>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detalles del Producto #{{ $product['id'] }}</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" value="{{ $product['descripcion'] }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" value="{{ $product['modelo'] }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" value="{{ $product['precio'] }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="unidades" class="form-label">Unidades</label>
                        <input type="number" class="form-control" value="{{ $product['unidades'] }}" disabled>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
        <br><br><br>
    </div>
@endsection

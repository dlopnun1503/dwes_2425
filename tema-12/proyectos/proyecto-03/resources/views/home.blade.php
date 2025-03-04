<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de vistas</title>
</head>
<body>

    <h1>{{ $title }}</h1>
    <h2>Hola Mundo</h2>
    <h3>Vistas en Laravel</h3>
    <h4>{{$nombre}}</h4>
    <h5>{!! $curso !!}</h5>
    <h6>{{ isset($ciclo) ? $ciclo : 'Desarrollo Web' }}</h6>

    @if($perfil == 'admin')
        <p>Perfil de administrador</p>
    @else 
        <p>Perfil de usuario</p>
    @endif

    <!-- Mostrar ciudades  -->
    <ul>
        @foreach($ciudades as $ciudad)
            <li>{{ $ciudad }}</li>
        @endforeach
    </ul>

    <!-- mostrar regiones  -->
    <ul>
        @forelse($regiones as $region)
            <li>{{ $region }}</li>
        @empty
            <li>No hay regiones</li>
        @endforelse
</body>
</html>
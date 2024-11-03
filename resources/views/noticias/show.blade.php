<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $noticia->titulo }} - Universidad Mariana</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-3xl font-bold text-blue-900 mb-4">{{ $noticia->titulo }}</h1>
        <p class="text-gray-500 text-sm mb-6">{{ $noticia->fecha_publicacion->format('d/m/Y') }}</p>
        
        @if ($noticia->imagen)
        <img src="{{ $noticia->imagen }}" alt="Imagen de la noticia" class="w-full max-w-md h-auto rounded-lg mb-6">
        @endif


        <p class="text-gray-700 leading-relaxed mb-6">{!! $noticia->contenido !!}</p>

        
        <a href="/home" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Volver
        </a>
    </div>
</body>
</html>

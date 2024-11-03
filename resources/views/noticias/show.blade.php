<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $noticia->titulo }} - Universidad Mariana</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-12">
        <!-- Título y Fecha -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-blue-800 mb-2">{{ $noticia->titulo }}</h1>
            <p class="text-gray-500 text-sm">{{ $noticia->fecha_publicacion->format('d/m/Y') }}</p>
        </div>

        <!-- Imagen principal -->
        @if ($noticia->imagen)
            <div class="mt-6 mb-6 flex justify-center">
                <img src="{{ $noticia->imagen }}" alt="Imagen de la noticia"
                    class="w-full max-w-lg rounded-lg shadow-md">
            </div>
        @endif

        <!-- Contenido de la noticia -->
        <div class="text-lg text-gray-700 leading-relaxed mb-8">
            {!! $noticia->contenido !!}
        </div>

        <!-- Botón de regreso -->
        <div class="flex justify-start">
            <a href="/home" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Volver a las noticias
            </a>
        </div>
    </div>
</body>

</html>

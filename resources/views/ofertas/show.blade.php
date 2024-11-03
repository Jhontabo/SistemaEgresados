<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $oferta->titulo }} - Universidad Mariana</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-12">
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-blue-900">{{ $oferta->titulo }}</h1>
            <p class="text-gray-500 text-sm mt-2">Publicado el: {{ $oferta->fecha_publicacion->format('d/m/Y') }}</p>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Empresa</h2>
                <p class="text-gray-800">{{ $oferta->empresa ?? 'No especificada' }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Ubicación</h2>
                <p class="text-gray-800">{{ $oferta->ubicacion }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Salario</h2>
                <p class="text-gray-800">
                    {{ $oferta->salario ? '$' . number_format($oferta->salario, 2) : 'No especificado' }}</p>
            </div>
        </section>

        <section class="mb-8">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Descripción del Puesto</h2>
            <div class="text-gray-700 leading-relaxed">{!! $oferta->descripcion !!}</div>
        </section>

        <footer class="text-center">
            <a href="{{ route('home') }}"
                class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Volver a las ofertas
            </a>
        </footer>
    </div>
</body>

</html>

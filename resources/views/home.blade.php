<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Egresados - Universidad Mariana</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50" x-data="{ openMenu: false, openModal: false }">
    <!-- Navbar Mejorado -->
    <nav class="bg-gradient-to-r from-blue-900 to-blue-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo y nombre con animación -->
                <div class="flex items-center transform hover:scale-105 transition-transform duration-200">
                    <img src="{{ asset('logo-unimar.png') }}" alt="Logo Universidad Mariana" class="h-14 w-auto">
                    <div class="ml-3">
                        <span class="text-2xl font-bold">Sistema de Egresados</span>
                        <p class="text-sm text-blue-200">Universidad Mariana</p>
                    </div>
                </div>

                <!-- Menú de usuario mejorado -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-3 bg-blue-800 bg-opacity-50 rounded-full px-4 py-2 hover:bg-opacity-75 transition duration-200">
                        <img src="{{ asset('default-avatar.png') }}" alt="Avatar" class="h-10 w-10 rounded-full border-2 border-white object-cover">
                        <div class="text-left">
                            <span class="block font-medium">{{ Auth::user()->name }}</span>
                            <span class="text-xs text-blue-200">Egresado</span>
                        </div>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown mejorado -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" class="absolute right-0 mt-3 w-48 rounded-lg bg-white shadow-xl ring-1 ring-black ring-opacity-5 py-1 z-50">
                        <a href="/admin" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 transition duration-200">
                            <i class="fas fa-tachometer-alt text-blue-600 mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('perfil.edit') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 transition duration-200">
                            <i class="fas fa-user text-blue-600 mr-3"></i>
                            <span>Perfil</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-blue-50 transition duration-200">
                                <i class="fas fa-sign-out-alt text-blue-600 mr-3"></i>
                                <span>Cerrar Sesión</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section Mejorado -->
    <header class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white py-24">
        <div class="absolute inset-0 bg-blue-900 opacity-20 pattern-grid-lg"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6 leading-tight">Bienvenido al Sistema de Egresados</h1>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Universidad Mariana - Formando profesionales con espíritu franciscano y compromiso social</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="bg-white text-blue-900 px-8 py-3 rounded-full font-semibold hover:bg-blue-50 transition duration-200">
                        Explorar Oportunidades
                    </a>
                    <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-900 transition duration-200">
                        Ver Eventos
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 -mt-10 relative z-20">
        <!-- Stats Overview Mejorado -->
        <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            @foreach ([
                ['icon' => 'fa-user-graduate', 'label' => 'Egresados Registrados', 'value' => $totalUsers ?? 0, 'color' => 'blue', 'gradient' => 'from-blue-500 to-blue-600'],
                ['icon' => 'fa-briefcase', 'label' => 'Oportunidades Laborales', 'value' => $totalJobs ?? 0, 'color' => 'green', 'gradient' => 'from-green-500 to-green-600'],
                ['icon' => 'fa-calendar-alt', 'label' => 'Eventos UNIMAR', 'value' => $activeEvents ?? 0, 'color' => 'purple', 'gradient' => 'from-purple-500 to-purple-600'],
                ['icon' => 'fa-newspaper', 'label' => 'Noticias Institucionales', 'value' => $totalNews ?? 0, 'color' => 'red', 'gradient' => 'from-red-500 to-red-600']
            ] as $stat)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="bg-gradient-to-br {{ $stat['gradient'] }} p-4 rounded-lg text-white">
                            <i class="fas {{ $stat['icon'] }} text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm font-medium">{{ $stat['label'] }}</h3>
                            <p class="text-3xl font-bold text-gray-800">{{ $stat['value'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>

        <!-- Latest News & Events Mejorado -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Noticias -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-newspaper mr-3"></i>Noticias UNIMAR
                    </h2>
                </div>
                <div class="p-6">
                    @forelse($news ?? [] as $newsItem)
                        <article class="mb-6 last:mb-0">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-newspaper text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800 hover:text-blue-600 transition duration-200">
                                        {{ $newsItem->title }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit($newsItem->content, 100) }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-gray-500 text-xs">{{ $newsItem->created_at->diffForHumans() }}</span>
                                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-newspaper text-gray-300 text-4xl mb-3"></i>
                            <p class="text-gray-500">No hay noticias disponibles</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Eventos -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-900 to-purple-800 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-calendar-alt mr-3"></i>Eventos Institucionales
                    </h2>
                </div>
                <div class="p-6">
                    @forelse($events ?? [] as $event)
                        <article class="mb-6 last:mb-0">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800 hover:text-purple-600 transition duration-200">
                                        {{ $event->title }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ $event->description }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-purple-600 text-xs flex items-center">
                                            <i class="far fa-calendar mr-1"></i>{{ $event->start_date }}
                                        </span>
                                        <a href="#" class="text-purple-600 hover:text-purple-800 text-sm font-medium inline-flex items-center">
                                            Ver detalles <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-calendar-alt text-gray-300 text-4xl mb-3"></i>
                            <p class="text-gray-500">No hay eventos próximos</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-gradient-to-br from-blue-900 to-blue-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('logo-unimar.png') }}" alt="Logo" class="h-12 w-auto mr-3">
                        <div>
                            <h3 class="text-xl font-bold">Universidad Mariana</h3>
                            <p class="text-blue-200 text-sm">Portal de Egresados</p>
                        </div>
                    </div>
                    <p class="text-blue-100">Formando profesionales íntegros con espíritu franciscano, comprometidos con el servicio y la excelencia.</p>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Enlaces Rápidos</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-blue-100 hover:text-white transition duration-200 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Inicio
                        </a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition duration-200 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Bolsa de Empleo
                        </a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition duration-200 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Eventos Académicos
                        </a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition duration-200 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Noticias
                        </a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition duration-200 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>Perfil
                        </a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-6">Contacto</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-blue-100">
                            <i class="fas fa-map-marker-alt w-5 mr-2"></i>
                            Calle 18 No. 34-104, San Juan de Pasto, Colombia
                        </li>
                        <li class="flex items-center text-blue-100">
                            <i class="fas fa-phone w-5 mr-2"></i>
                            +57 (602) 7244460
                        </li>
                        <li class="flex items-center text-blue-100">
                            <i class="fas fa-envelope w-5 mr-2"></i>
                            egresados@umariana.edu.co
                        </li>
                        <li class="mt-4">
                            <div class="flex space-x-4">
                                <a href="#" class="text-blue-100 hover:text-white transition duration-200">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </a>
                                <a href="#" class="text-blue-100 hover:text-white transition duration-200">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="#" class="text-blue-100 hover:text-white transition duration-200">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                                <a href="#" class="text-blue-100 hover:text-white transition duration-200">
                                    <i class="fab fa-linkedin-in text-xl"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-700 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-blue-200 text-sm">
                        © {{ date('Y') }} Universidad Mariana. Todos los derechos reservados.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-blue-200 hover:text-white text-sm">Política de Privacidad</a>
                        <a href="#" class="text-blue-200 hover:text-white text-sm">Términos de Uso</a>
                        <a href="#" class="text-blue-200 hover:text-white text-sm">Mapa del Sitio</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
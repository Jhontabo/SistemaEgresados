<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Egresados - Universidad Mariana</title>
    @vite('resources/css/app.css')

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50" x-data="{ openMenu: false, openModal: false }">
    <!-- Navbar -->
    <nav class="bg-blue-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo y nombre -->
                <div class="flex items-center">
                    <img src="{{ asset('logo-unimar.png') }}" alt="Logo Universidad Mariana" class="h-12 w-auto">
                    <span class="ml-3 text-xl font-semibold">Portal de Egresados UNIMAR</span>
                </div>

                <!-- Menú de usuario -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-white hover:text-gray-200 focus:outline-none" aria-expanded="open" aria-controls="user-menu">
                        <img src="{{ asset('default-avatar.png') }}" alt="Avatar" class="h-8 w-8 rounded-full border-2 border-white">
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 py-2 bg-white rounded-md shadow-xl z-50" id="user-menu">
                        <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Bienvenido al Portal de Egresados</h1>
            <p class="text-xl">Universidad Mariana - Formando profesionales con espíritu franciscano</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Stats Overview -->
        <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            @foreach ([
                ['icon' => 'fa-user-graduate', 'label' => 'Egresados Registrados', 'value' => $totalUsers ?? 0, 'color' => 'blue'],
                ['icon' => 'fa-briefcase', 'label' => 'Oportunidades Laborales', 'value' => $totalJobs ?? 0, 'color' => 'green'],
                ['icon' => 'fa-calendar-alt', 'label' => 'Eventos UNIMAR', 'value' => $activeEvents ?? 0, 'color' => 'purple'],
                ['icon' => 'fa-newspaper', 'label' => 'Noticias Institucionales', 'value' => $totalNews ?? 0, 'color' => 'red'],
            ] as $stat)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-{{ $stat['color'] }}-100 text-{{ $stat['color'] }}-800">
                        <i class="fas {{ $stat['icon'] }} text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">{{ $stat['label'] }}</h3>
                        <p class="text-2xl font-semibold">{{ $stat['value'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </section>

        <!-- Latest News & Events -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4 text-blue-900">Noticias UNIMAR</h2>
                @forelse($news ?? [] as $newsItem)
                    <article class="mb-4 pb-4 border-b last:border-b-0 hover:bg-gray-50 p-2 rounded">
                        <h3 class="font-medium text-blue-800">{{ $newsItem->title }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($newsItem->content, 100) }}</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-gray-500 text-xs">{{ $newsItem->created_at->diffForHumans() }}</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Leer más →</a>
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500">No hay noticias disponibles</p>
                @endforelse
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4 text-blue-900">Eventos Institucionales</h2>
                @forelse($events ?? [] as $event)
                    <article class="mb-4 pb-4 border-b last:border-b-0 hover:bg-gray-50 p-2 rounded">
                        <h3 class="font-medium text-blue-800">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ $event->description }}</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-gray-500 text-xs"><i class="far fa-calendar mr-1"></i>{{ $event->start_date }}</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Ver detalles →</a>
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500">No hay eventos próximos</p>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Universidad Mariana</h3>
                    <p class="text-gray-300">Formando profesionales íntegros con espíritu franciscano, comprometidos con el servicio y la excelencia.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Inicio</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Bolsa de Empleo</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Eventos Académicos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Educación Continua</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Directorio de Egresados</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i>Calle 18 No. 34-104 Pasto, Nariño</li>
                        <li class="flex items-center"><i class="fas fa-phone mr-2"></i>+57 (602) 7244460</li>
                        <li class="flex items-center"><i class="fas fa-envelope mr-2"></i>egresados@umariana.edu.co</li>
                        <li class="flex items-center"><i class="fas fa-globe mr-2"></i>www.umariana.edu.co</li>
                    </ul>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-linkedin-in text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-800 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} Universidad Mariana - Portal de Egresados. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Modal de Actualización de Datos -->
    <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="openModal = false"></div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="bg-blue-900 px-6 py-4">
                    <h3 class="text-lg font-medium text-white">Actualización de Datos</h3>
                </div>

                <form class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Teléfono Actual</label>
                        <input type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico Personal</label>
                        <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex justify-end">
                        <button type="button" @click="openModal = false" class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-900 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Inicialización de Alpine.js para las pestañas y el modal
        Alpine.data('tabs', () => ({
            activeTab: 'personal',
            switchTab(tab) { this.activeTab = tab }
        }));
    </script>
</body>
</html>

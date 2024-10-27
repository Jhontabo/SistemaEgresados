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
<body class="bg-gray-50">
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
                <div class="flex items-center space-x-4">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-white hover:text-gray-200 focus:outline-none">
                            <img src="{{ asset('default-avatar.png') }}" alt="Avatar" class="h-8 w-8 rounded-full border-2 border-white">
                            <span class="font-medium">{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition
                             class="absolute right-0 mt-2 w-48 py-2 bg-white rounded-md shadow-xl z-50">
                            <a href="/perfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Mi Perfil
                            </a>
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
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Bienvenido al Portal de Egresados</h1>
            <p class="text-xl">Universidad Mariana - Formando profesionales con espíritu franciscano</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-800">
                        <i class="fas fa-user-graduate text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Egresados Registrados</h3>
                        <p class="text-2xl font-semibold">{{ $totalUsers ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-800">
                        <i class="fas fa-briefcase text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Oportunidades Laborales</h3>
                        <p class="text-2xl font-semibold">{{ $totalJobs ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-800">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Eventos UNIMAR</h3>
                        <p class="text-2xl font-semibold">{{ $activeEvents ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-800">
                        <i class="fas fa-newspaper text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Noticias Institucionales</h3>
                        <p class="text-2xl font-semibold">{{ $totalNews ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Tabs -->
        <div class="bg-white rounded-lg shadow-md mb-8">
            <div class="border-b">
                <nav class="flex -mb-px" x-data="{ activeTab: 'personal' }">
                    <button @click="activeTab = 'personal'" 
                            :class="{ 'border-blue-800 text-blue-800': activeTab === 'personal' }"
                            class="tab-button py-4 px-6 inline-flex items-center text-sm font-medium border-b-2">
                        <i class="fas fa-user-circle mr-2"></i>
                        Información Personal
                    </button>
                    <button @click="activeTab = 'academic'"
                            :class="{ 'border-blue-800 text-blue-800': activeTab === 'academic' }"
                            class="tab-button py-4 px-6 inline-flex items-center text-sm font-medium border-b-2">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Información Académica
                    </button>
                    <button @click="activeTab = 'professional'"
                            :class="{ 'border-blue-800 text-blue-800': activeTab === 'professional' }"
                            class="tab-button py-4 px-6 inline-flex items-center text-sm font-medium border-b-2">
                        <i class="fas fa-briefcase mr-2"></i>
                        Información Profesional
                    </button>
                </nav>
            </div>
            
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Egresado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Programa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año de Graduación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado Actual</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($graduates ?? [] as $graduate)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $graduate->avatar ?? asset('default-avatar.png') }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $graduate->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $graduate->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $graduate->program }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $graduate->graduation_year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $graduate->current_status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Latest News & Events -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Latest News -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4 text-blue-900">Noticias UNIMAR</h2>
                    @forelse($news ?? [] as $newsItem)
                        <div class="mb-4 pb-4 border-b last:border-b-0 hover:bg-gray-50 p-2 rounded">
                            <h3 class="font-medium text-blue-800">{{ $newsItem->title }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ Str::limit($newsItem->content, 100) }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-gray-500 text-xs">{{ $newsItem->created_at->diffForHumans() }}</span>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Leer más →</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No hay noticias disponibles</p>
                    @endforelse
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4 text-blue-900">Eventos Institucionales</h2>
                    @forelse($events ?? [] as $event)
                        <div class="mb-4 pb-4 border-b last:border-b-0 hover:bg-gray-50 p-2 rounded">
                            <h3 class="font-medium text-blue-800">{{ $event->title }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $event->description }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center text-gray-500 text-xs">
                                    <i class="far fa-calendar mr-1"></i>
                                    <span>{{ $event->start_date }}</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Ver detalles →</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No hay eventos próximos</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

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
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i> 
                            Calle 18 No. 34-104 Pasto, Nariño
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i> 
                            +57 (602) 7244460
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            egresados@umariana.edu.co
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-globe mr-2"></i>
                            www.umariana.edu.co
                        </li>
                    </ul>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-800 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} Universidad Mariana - Portal de Egresados. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Modal de Actualización de Datos -->
    <div x-data="{ open: false }" x-show="open" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"></div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="bg-blue-900 px-6 py-4">
                    <h3 class="text-lg font-medium text-white">Actualización de Datos</h3>
                </div>

                <form class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Teléfono Actual
                        </label>
                        <input type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Correo Electrónico Personal
                        </label>
                        <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Lugar de Residencia Actual
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Empresa Actual
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Cargo Actual
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex justify-end">
                        <button type="button" @click="open = false" class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Funcionalidad para las pestañas
        document.addEventListener('alpine:init', () => {
            Alpine.data('tabs', () => ({
                activeTab: 'personal',
                
                init() {
                    // Inicializar la primera pestaña como activa
                    this.switchTab('personal');
                },

                switchTab(tab) {
                    this.activeTab = tab;
                }
            }));
        });

        // Funcionalidad para mostrar/ocultar el modal de actualización
        window.showUpdateModal = function() {
            Alpine.store('modal').open = true;
        }

        // Funcionalidad para el menú responsive
        window.toggleMenu = function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        }

        // Inicialización de tooltips
        $(document).ready(function(){
            $('[data-tooltip]').tooltip();
        });
    </script>
</body>
</html>
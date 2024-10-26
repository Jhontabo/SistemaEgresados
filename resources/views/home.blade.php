<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Gestión</title>
    @vite('resources/css/app.css')

    <!-- Añadir FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 w-auto">
                    <span class="ml-2 text-xl font-semibold">Portal de Gestión</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/admin" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="/admin" class="text-gray-700 hover:text-gray-900">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Bienvenido al Portal de Gestión</h1>
            <p class="text-xl">Accede a toda la información y recursos disponibles</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <i class="fas fa-users text-blue-600 text-3xl"></i>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Usuarios Totales</h3>
                        <p class="text-2xl font-semibold">{{ $totalUsers ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <i class="fas fa-briefcase text-green-600 text-3xl"></i>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Ofertas Laborales</h3>
                        <p class="text-2xl font-semibold">{{ $totalJobs ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <i class="fas fa-calendar text-purple-600 text-3xl"></i>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Eventos Activos</h3>
                        <p class="text-2xl font-semibold">{{ $activeEvents ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <i class="fas fa-newspaper text-red-600 text-3xl"></i>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm">Noticias</h3>
                        <p class="text-2xl font-semibold">{{ $totalNews ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Information Tabs -->
        <div class="bg-white rounded-lg shadow mb-8">
            <div class="border-b">
                <nav class="flex -mb-px">
                    <button class="tab-button text-blue-600 border-b-2 border-blue-600 py-4 px-6 inline-flex items-center text-sm font-medium">
                        <i class="fas fa-user-circle mr-2"></i>
                        Información Personal
                    </button>
                    <button class="tab-button text-gray-500 hover:text-gray-700 py-4 px-6 inline-flex items-center text-sm font-medium">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Información Académica
                    </button>
                    <button class="tab-button text-gray-500 hover:text-gray-700 py-4 px-6 inline-flex items-center text-sm font-medium">
                        <i class="fas fa-briefcase mr-2"></i>
                        Información Laboral
                    </button>
                </nav>
            </div>
            
            <!-- Personal Information Table -->
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Nacimiento</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($personalInfos as $info)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ asset('default-avatar.png') }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $info->user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $info->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $info->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $info->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $info->birthdate }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="Admin" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                                    <a href="#" class="text-green-600 hover:text-green-900">Editar</a>
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
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4">Últimas Noticias</h2>
                    @forelse($news ?? [] as $newsItem)
                        <div class="mb-4 pb-4 border-b last:border-b-0">
                            <h3 class="font-medium">{{ $newsItem->title }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ Str::limit($newsItem->content, 100) }}</p>
                            <span class="text-gray-500 text-xs">{{ $newsItem->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500">No hay noticias disponibles</p>
                    @endforelse
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4">Próximos Eventos</h2>
                    @forelse($events ?? [] as $event)
                        <div class="mb-4 pb-4 border-b last:border-b-0">
                            <h3 class="font-medium">{{ $event->title }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $event->description }}</p>
                            <div class="flex items-center text-gray-500 text-xs mt-2">
                                <i class="far fa-calendar mr-1"></i>
                                <span>{{ $event->start_date }}</span>
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
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Acerca de</h3>
                    <p class="text-gray-400">Sistema de gestión para la información personal, académica y laboral.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Inicio</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Eventos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Ofertas Laborales</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center"><i class="fas fa-envelope mr-2"></i> contacto@ejemplo.com</li>
                        <li class="flex items-center"><i class="fas fa-phone mr-2"></i> +1234567890</li>
                        <li class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i> Dirección Ejemplo</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Sistema de Gestión. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Simple tab functionality
        $(document).ready(function() {
            $('.tab-button').click(function() {
                $('.tab-button').removeClass('text-blue-600 border-b-2 border-blue-600').addClass('text-gray-500');
                $(this).removeClass('text-gray-500').addClass('text-blue-600 border-b-2 border-blue-600');
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Gestión</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Sección de bienvenida mejorada -->
    <main class="flex-grow">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">
                    Bienvenido al Portal de Gestión
                </h1>
                <p class="text-xl text-blue-100 mb-8">
                    Sistema integral de administración y control
                </p>
                <div class="inline-block border-2 border-white rounded-lg p-1 bg-white bg-opacity-10">
                    <div class="flex space-x-4 text-sm">
                        <!-- Cambié 'Dashboard' por 'Registrarse' y la URL de redirección -->
                        <a href="/register" class="px-4 py-2 rounded-md hover:bg-white hover:bg-opacity-20 transition duration-300">Registrarse</a>
                        <a href="/login" class="px-4 py-2 bg-white text-blue-800 rounded-md hover:bg-opacity-90 transition duration-300">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer mejorado y simplificado -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Información de contacto -->
                <div class="text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start mb-4">
                        <i class="fas fa-cube text-blue-400 text-2xl mr-2"></i>
                        <span class="font-semibold text-lg">Portal de Gestión</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Soluciones empresariales innovadoras
                    </p>
                </div>

                <!-- Enlaces rápidos -->
                <div class="text-center">
                    <div class="flex justify-center space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fas fa-home mr-2"></i>Inicio
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fas fa-question-circle mr-2"></i>Ayuda
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fas fa-envelope mr-2"></i>Contacto
                        </a>
                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="text-center md:text-right">
                    <div class="flex justify-center md:justify-end space-x-4">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-blue-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-blue-400 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-blue-800 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Línea divisoria y copyright -->
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; 2024 Portal de Gestión. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>

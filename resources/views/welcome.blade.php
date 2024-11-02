<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Egresados - Universidad Mariana</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Header/Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-blue-600 text-2xl mr-2"></i>
                    <span class="font-bold text-xl text-gray-800">UNIMAR Egresados</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-gray-600 hover:text-blue-600 px-3 py-2">Iniciar Sesión</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-grow">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="text-left">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                            Conectando el Futuro Profesional
                        </h1>
                        <p class="text-xl text-blue-100 mb-8">
                            Únete a la red de egresados más grande de la Universidad Mariana. Descubre oportunidades laborales, mantente conectado y sé parte de nuestra comunidad.
                        </p>
                        <div class="flex space-x-4">
                            <a href="/register" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300">
                                Comenzar Ahora
                            </a>
                            <a href="#beneficios" class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                                Conoce Más
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white p-6 rounded-lg shadow-xl">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-4 bg-blue-50 rounded-lg">
                                    <i class="fas fa-briefcase text-3xl text-blue-600 mb-2"></i>
                                    <h3 class="text-gray-800 font-semibold">Bolsa de Empleo</h3>
                                </div>
                                <div class="text-center p-4 bg-blue-50 rounded-lg">
                                    <i class="fas fa-users text-3xl text-blue-600 mb-2"></i>
                                    <h3 class="text-gray-800 font-semibold">Networking</h3>
                                </div>
                                <div class="text-center p-4 bg-blue-50 rounded-lg">
                                    <i class="fas fa-graduation-cap text-3xl text-blue-600 mb-2"></i>
                                    <h3 class="text-gray-800 font-semibold">Educación Continua</h3>
                                </div>
                                <div class="text-center p-4 bg-blue-50 rounded-lg">
                                    <i class="fas fa-certificate text-3xl text-blue-600 mb-2"></i>
                                    <h3 class="text-gray-800 font-semibold">Certificaciones</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Beneficios Section -->
        <section id="beneficios" class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Beneficios para Egresados</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6 border border-gray-200 rounded-lg hover:shadow-lg transition duration-300">
                        <i class="fas fa-laptop-code text-4xl text-blue-600 mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Desarrollo Profesional</h3>
                        <p class="text-gray-600">Accede a cursos, talleres y recursos para tu crecimiento profesional.</p>
                    </div>
                    <div class="p-6 border border-gray-200 rounded-lg hover:shadow-lg transition duration-300">
                        <i class="fas fa-handshake text-4xl text-blue-600 mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Red de Contactos</h3>
                        <p class="text-gray-600">Conecta con otros egresados y amplía tu red profesional.</p>
                    </div>
                    <div class="p-6 border border-gray-200 rounded-lg hover:shadow-lg transition duration-300">
                        <i class="fas fa-book-reader text-4xl text-blue-600 mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Biblioteca Digital</h3>
                        <p class="text-gray-600">Acceso a recursos académicos y publicaciones especializadas.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Mejorado -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-graduation-cap text-blue-400 text-2xl mr-2"></i>
                        <span class="font-semibold text-lg">UNIMAR Egresados</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Formando profesionales exitosos desde hace más de 50 años.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Inicio</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Nosotros</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Servicios</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Contacto</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Calle 18 No. 34-104
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            (+57) 7244460
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            egresados@umariana.edu.co
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Síguenos</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-blue-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-blue-400 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-pink-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-blue-800 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 Sistema de Egresados Universidad Mariana. Creado por Jhon Tajumbina y Sara Macuase. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
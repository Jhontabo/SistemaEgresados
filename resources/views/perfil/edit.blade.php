@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold mb-6">Editar Perfil</h2>

        <!-- Mostrar mensajes de éxito -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para editar el perfil -->
        <form action="{{ route('perfil.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Teléfono:</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Residencia -->
            <div class="mb-4">
                <label for="residence" class="block text-gray-700">Lugar de Residencia:</label>
                <input type="text" name="residence" value="{{ old('residence', $user->residence) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('residence')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Empresa -->
            <div class="mb-4">
                <label for="company" class="block text-gray-700">Empresa Actual:</label>
                <input type="text" name="company" value="{{ old('company', $user->company) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('company')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cargo -->
            <div class="mb-4">
                <label for="position" class="block text-gray-700">Cargo Actual:</label>
                <input type="text" name="position" value="{{ old('position', $user->position) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('position')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Actualizar Perfil</button>
            </div>
        </form>
    </div>
</div>
@endsection

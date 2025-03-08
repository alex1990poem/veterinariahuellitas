@extends('layouts.app')

@section('title', 'Gestión')

@section('content')
    <h1 class="text-xl font-semibold mb-6">Gestión</h1>

    <div x-data="{ tab: 'personal' }" class="space-y-4">
        <div class="flex space-x-4 border-b-2 border-gray-200 w-full">
            <button 
                @click="tab = 'veterinario'" 
                :class="tab === 'veterinario' ? 'border-blue-500 text-blue-500' : 'border-transparent hover:border-gray-400'"
                class="py-2 px-4 border-b-2 font-medium">
                Veterinario
            </button>
            <button 
                @click="tab = 'proveedor'" 
                :class="tab === 'proveedor' ? 'border-blue-500 text-blue-500' : 'border-transparent hover:border-gray-400'"
                class="py-2 px-4 border-b-2 font-medium">
                Proveedor
            </button>
            <button 
                @click="tab = 'cliente'" 
                :class="tab === 'cliente' ? 'border-blue-500 text-blue-500' : 'border-transparent hover:border-gray-400'"
                class="py-2 px-4 border-b-2 font-medium">
                Cliente
            </button>
        </div>

        <div x-show="tab === 'veterinario'" class="p-4 bg-gray-100 rounded-lg">
            <h2 class="text-lg font-semibold">Información de Personal Veterinario</h2>
            <form class="flex flex-col space-y-4">
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Tarjeta profesional</label>
                    <input 
                        type="text" 
                        x-data 
                        x-on:input="$event.target.value = $event.target.value.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                        class="w-full p-2 border rounded"
                        maxlength="11">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Nombres</label>
                    <input 
                        type="text" 
                        x-data 
                        x-on:input="$event.target.value = $event.target.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ')" 
                        class="w-full p-2 border border-gray-400 rounded">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Apellidos</label>
                    <input 
                        type="text" 
                        x-data 
                        x-on:input="$event.target.value = $event.target.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ')" 
                        class="w-full p-2 border border-gray-400 rounded">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Correo Electrónico</label>
                    <input type="email" class="w-full p-2 border border-gray-400 rounded">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Teléfono</label>
                    <input type="tel" class="w-full p-2 border border-gray-400 rounded">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Dirección</label>
                    <input type="text" class="w-full p-2 border border-gray-400 rounded">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Especialidad</label>
                    <input type="text" class="w-full p-2 border border-gray-400 rounded">
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Horario Mañana</label>
                    <div class="flex space-x-2">
                        <input type="time" class="w-full p-2 border border-gray-400 rounded">
                        <input type="time" class="w-full p-2 border border-gray-400 rounded">
                    </div>
                </div>
            
                <div class="w-1/3">
                    <label class="block text-sm font-medium">Horario Tarde</label>
                    <div class="flex space-x-2">
                        <input type="time" class="w-full p-2 border border-gray-400 rounded">
                        <input type="time" class="w-full p-2 border border-gray-400 rounded">
                    </div>
                </div>
            
                <div class="w-1/4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Guardar
                    </button>
                </div>
            </form>
        </div>

        <div x-show="tab === 'proveedor'" class="p-4 bg-gray-100 rounded-lg">
            <h2 class="text-lg font-semibold">Información de Proveedor</h2>
            <p>Contenido relacionado con los proveedores...</p>
        </div>

        <div x-show="tab === 'cliente'" class="p-4 bg-gray-100 rounded-lg">
            <h2 class="text-lg font-semibold">Información de Cliente</h2>
            <p>Contenido relacionado con los clientes...</p>
        </div>
    </div>
@endsection



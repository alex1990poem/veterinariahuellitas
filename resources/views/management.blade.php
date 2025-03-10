@extends('layouts.app')

@section('title', 'Gestión')

@section('content')
<h1 class="text-xl font-semibold mb-6">Gestión</h1>

<div x-data="{ tab: 'veterinario' }" class="space-y-4">
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
                <label class="block text-sm font-medium">Identificación</label>
                <input
                    type="text"
                    x-data
                    x-on:input="$event.target.value = $event.target.value.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)" class="w-full p-2 border rounded"
                    maxlength="11">
            </div>

            <div class="w-1/3">
                <label class="block text-sm font-medium">Nombres</label>
                <input
                    type="text"
                    x-data
                    x-on:input="$event.target.value = $event.target.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border border-gray-400 rounded">
            </div>

            <div class="w-1/3">
                <label class="block text-sm font-medium">Apellidos</label>
                <input
                    type="text"
                    x-data
                    x-on:input="$event.target.value = $event.target.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border border-gray-400 rounded">
            </div>

            <div class="w-1/3" x-data="{ email: '', isValid: true }">
                <label class="block text-sm font-medium">Correo Electrónico</label>
                <input
                    type="email"
                    x-model="email"
                    x-on:input="
                        email = email.replace(/[^a-zA-Z0-9@._%+-]/g, '').slice(0, 50);
                        isValid = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
                    "
                    class="w-full p-2 border border-gray-400 rounded">
                <template x-if="!isValid && email !== ''">
                    <p class="mt-2 text-red-500 text-sm">
                        Correo electrónico no válido. Verifica el formato (ej. usuario@dominio.com).
                    </p>
                </template>
            </div>

            <div class="w-1/3" x-data="{ tel: '', isValid: true }">
                <label class="block text-sm font-medium">Teléfono</label>
                <input
                    type="tel"
                    x-model="tel"
                    x-on:input="
                    tel = tel.replace(/[^0-9]/g, '').slice(0, 10);
                    isValid = /^\d{10}$/.test(tel);
                "
                    class="w-full p-2 border border-gray-400 rounded">
                <template x-if="!isValid && tel !== ''">
                    <p class="mt-2 text-red-500 text-sm">
                        El número de teléfono debe tener exactamente 10 dígitos.
                    </p>
                </template>
            </div>

            <div class="w-1/3">
                <label class="block text-sm font-medium">Dirección</label>
                <input
                    type="text"
                    x-data
                    x-on:input="$event.target.value = $event.target.value.slice(0, 50)"
                    class="w-full p-2 border border-gray-400 rounded">
            </div>

            <div class="w-1/3">
                <label class="block text-sm font-medium">Especialidad</label>
                <select class="w-full p-2 border border-gray-400 rounded">
                    <option value="">Selecciona una especialidad</option>
                    <option value="medicina_interna">Medicina interna</option>
                    <option value="cirugia_veterinaria">Cirugía veterinaria</option>
                    <option value="odontologia_veterinaria">Odontología veterinaria</option>
                    <option value="medicina_preventiva">Medicina preventiva</option>
                    <option value="estetica_cuidados">Estética y cuidados</option>
                </select>
            </div>

            <div class="w-1/3">
                <label class="block text-sm font-medium">Horario de atención</label>
                <select class="w-full p-2 border border-gray-400 rounded">
                    <option value="">Seleccione un horario de atención</option>
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                    <option value="jornada_completa">Jornada completa</option>
                </select>
            </div>

            <div class="w-1/3">
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
@extends('layouts.app')

@section('title', 'Citas')

@section('content')
<h1 class="text-xl font-semibold mb-6">Citas</h1>

<div x-data="{ tab: 'veterinario' }" class="space-y-4">
    <!-- Inicio del código para pestañas -->
    <div class="flex space-x-4 border-b-2 border-gray-200 w-full">

    </div>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6" x-data="{ id: '', date: '', time: '', id_cliente: '', client: '', pet: '', vet: '', est: 'Pendiente', tip_serv: 'Medicina General y Preventiva' }">
        <h3 class="text-xl font-semibold text-center text-gray-700 mb-4">Agenda de citas</h3>
        <form id="formCitas" method="POST" action="guardar_cita.php">
            <input type="hidden" x-model="id" name="id">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="date">Fecha</label>
            <input type="date" id="date" name="date" x-model="date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="time">Hora</label>
            <input type="time" id="time" name="time" x-model="time" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="id_cliente">Id Mascota</label>
            <input type="text" id="id_cliente" name="id_cliente" x-model="id_cliente" placeholder="Id Mascota" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="client">Cliente</label>
            <input type="text" id="client" name="client" x-model="client" placeholder="Nombre del cliente" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="pet">Mascota</label>
            <input type="text" id="pet" name="pet" x-model="pet" placeholder="Nombre de la mascota" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="vet">Veterinario</label>
            <input type="text" id="vet" name="vet" x-model="vet" placeholder="Nombre del veterinario" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="est">Estado</label>
            <select id="est" name="est" x-model="est" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
                <option value="Pendiente">Pendiente</option>
                <option value="Confirmada">Confirmada</option>
                <option value="Cancelada">Cancelada</option>
                <option value="No asistió (Inasistencia)">No asistió (Inasistencia)</option>
            </select>
            
            <label class="block mb-2 text-sm font-medium text-gray-700" for="tip_serv">Tipo de servicio</label>
            <select id="tip_serv" name="tip_serv" x-model="tip_serv" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
                <option value="Medicina General">Medicina General</option>
                <option value="Medicina Especializada">Medicina Especializada</option>
                <option value="Servicios Estéticos y de Bienestar">Servicios Estéticos y de Bienestar</option>
                <option value="Farmacia Veterinaria">Farmacia Veterinaria</option>
            </select>
            
            <div class="flex justify-center gap-4 mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600">Guardar</button>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600" @click="id=''; date=''; time=''; id_cliente=''; client=''; pet=''; vet=''; est='Pendiente'; tip_serv='Medicina General y Preventiva'">Eliminar</button>
            </div>
        </form>
    </div>   <!-- Fin del código para pestañas -->
</div>
@endsection
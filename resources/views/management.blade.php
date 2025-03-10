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

        <form
            x-data="formData()"
            x-on:submit.prevent="submitForm"
            class="flex flex-col space-y-4">
            <!-- IDENTIFICACIÓN -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Identificación</label>
                <input
                    type="text"
                    x-model="identificacion"
                    x-on:input="identificacion = identificacion.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- NOMBRES -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Nombres</label>
                <input
                    type="text"
                    x-model="nombres"
                    x-on:input="nombres = nombres.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- APELLIDOS -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Apellidos</label>
                <input
                    type="text"
                    x-model="apellidos"
                    x-on:input="apellidos = apellidos.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- CORREO ELECTRÓNICO -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Correo Electrónico</label>
                <input
                    x-model="email"
                    x-on:input="
                    email = email.replace(/[^a-zA-Z0-9@._%+\-]/g, '').slice(0, 50);
                    emailValido = validarEmail(email);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos solo si hay contenido y no es válido -->
                <template x-if="email !== '' && !emailValido">
                    <p class="mt-1 text-red-500 text-sm">
                        Correo electrónico no válido (ej. usuario@dominio.com).
                    </p>
                </template>
            </div>

            <!-- TELÉFONO -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Teléfono</label>
                <input
                    type="tel"
                    x-model="telefono"
                    x-on:input="
                    telefono = telefono.replace(/[^0-9]/g, '').slice(0, 10);
                    telefonoValido = (telefono.length === 10);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos si el usuario ya introdujo algo pero no cumple 10 dígitos -->
                <template x-if="telefono !== '' && !telefonoValido">
                    <p class="mt-1 text-red-500 text-sm">
                        El número de teléfono debe tener exactamente 10 dígitos.
                    </p>
                </template>
            </div>

            <!-- DIRECCIÓN -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Dirección</label>
                <input
                    type="text"
                    x-model="direccion"
                    x-on:input="direccion = direccion.slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- ESPECIALIDAD -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Especialidad</label>
                <select
                    x-model="especialidad"
                    class="w-full p-2 border rounded"
                    required>
                    <option value="">Selecciona una especialidad</option>
                    <option value="medicina_interna">Medicina interna</option>
                    <option value="cirugia_veterinaria">Cirugía veterinaria</option>
                    <option value="odontologia_veterinaria">Odontología veterinaria</option>
                    <option value="medicina_preventiva">Medicina preventiva</option>
                    <option value="estetica_cuidados">Estética y cuidados</option>
                </select>
            </div>

            <!-- HORARIO ATENCIÓN -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Horario de atención</label>
                <select
                    x-model="horario_atencion"
                    class="w-full p-2 border rounded"
                    required>
                    <option value="">Seleccione un horario de atención</option>
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                    <option value="jornada_completa">Jornada completa</option>
                </select>
            </div>

            <!-- BOTÓN GUARDAR -->
            <div class="w-1/3">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
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
<script>
    function formData() {
        return {
            // Variables
            identificacion: '',
            nombres: '',
            apellidos: '',
            email: '',
            emailValido: false,
            telefono: '',
            telefonoValido: false,
            direccion: '',
            especialidad: '',
            horario_atencion: '',

            // Valida el formato del email con una expresión regular
            validarEmail(valor) {
                const regex = /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/;
                return regex.test(valor);
            },

            async submitForm(event) {

                // Validación adicional de teléfono y email
                if (!this.telefonoValido) {
                    Swal.fire({
                        title: 'Teléfono no válido',
                        text: 'El número de teléfono ingresado no cumple los 10 dígitos.',
                        icon: 'warning'
                    });
                    return;
                }
                if (!this.emailValido) {
                    Swal.fire({
                        title: 'Correo no válido',
                        text: 'El correo electrónico ingresado no es correcto.',
                        icon: 'warning'
                    });
                    return;
                }

                // 3) Enviar los datos a tu endpoint
                try {
                    const response = await fetch('/api/veterinarios', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            identificacion: this.identificacion,
                            nombres: this.nombres,
                            apellidos: this.apellidos,
                            email: this.email,
                            telefono: this.telefono,
                            direccion: this.direccion,
                            especialidad: this.especialidad,
                            horario_atencion: this.horario_atencion
                        })
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        Swal.fire({
                            title: 'Error al guardar',
                            text: '',
                            icon: 'error'
                        });
                        return;
                    }

                    const data = await response.json();
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Veterinario creado exitosamente',
                        icon: 'success'
                    });

                    // Ejemplo: limpiar el formulario o redirigir
                    // this.identificacion = '';
                    // this.nombres = '';
                    // ... etc ...
                } catch (error) {
                    console.error('Error en la petición:', error);
                    alert('Ocurrió un error inesperado.');
                }
            }
        }
    }
</script>
@endsection
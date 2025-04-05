@extends('layouts.app')

@section('title', 'Gestión')

@section('content')
<h1 class="text-xl font-semibold mb-6">Gestión</h1>

<div x-data="{ tab: 'veterinario' }" class="space-y-4">
    <!-- Inicio del código para pestañas -->
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
        <button
            @click="tab = 'mascota'"
            :class="tab === 'mascota' ? 'border-blue-500 text-blue-500' : 'border-transparent hover:border-gray-400'"
            class="py-2 px-4 border-b-2 font-medium">
            Mascota
        </button>
    </div>
    <!-- Fin del código para pestañas -->

    <!-- Inicio del código para el contenedor de cada pestaña (veterinario) -->
    <div x-show="tab === 'veterinario'" class="p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold">Información de Personal Veterinario</h2>

        <form
            x-data="formVeterinario()"
            x-on:submit.prevent="submitForm"
            class="flex flex-col space-y-4">
            <!-- IDENTIFICACIÓN -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Identificación</label>
                <input
                    type="text"
                    x-model="dataForm.identificacion"
                    12345678911
                    x-on:input="dataForm.identificacion = dataForm.identificacion.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- NOMBRES -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Nombres</label>
                <input
                    type="text"
                    x-model="dataForm.nombres"
                    x-on:input="dataForm.nombres = dataForm.nombres.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- APELLIDOS -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Apellidos</label>
                <input
                    type="text"
                    x-model="dataForm.apellidos"
                    x-on:input="dataForm.apellidos = dataForm.apellidos.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- CORREO ELECTRÓNICO -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Correo Electrónico</label>
                <input
                    x-model="dataForm.email"
                    x-on:input="
                    dataForm.email = dataForm.email.replace(/[^a-zA-Z0-9@._%+\-]/g, '').slice(0, 50);
                    emailValido = validarEmail(dataForm.email);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos solo si hay contenido y no es válido -->
                <template x-if="dataForm.email !== '' && !emailValido">
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
                    x-model="dataForm.telefono"
                    x-on:input="
                    dataForm.telefono = dataForm.telefono.replace(/[^0-9]/g, '').slice(0, 10);
                    telefonoValido = validarTelefono(dataForm.telefono);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos si el usuario ya introdujo algo pero no cumple 10 dígitos -->
                <template x-if="dataForm.telefono !== '' && !telefonoValido">
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
                    x-model="dataForm.direccion"
                    x-on:input="dataForm.direccion = dataForm.direccion.slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- ESPECIALIDAD -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Especialidad</label>
                <select
                    x-model="dataForm.especialidad"
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
                    x-model="dataForm.horario_atencion"
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
    <!-- Inicio del código para el contenedor (proveedor) -->
    <div x-show="tab === 'proveedor'" class="p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold">Información de Proveedor</h2>
        <form
            x-data="formProveedor()"
            x-on:submit.prevent="submitForm"
            class="flex flex-col space-y-4">
            <!-- IDENTIFICACIÓN -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Identificación</label>
                <input
                    type="text"
                    x-model="dataForm.identificacion"
                    x-on:input="dataForm.identificacion = dataForm.identificacion.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- NOMBRES -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Nombres</label>
                <input
                    type="text"
                    x-model="dataForm.nombres"
                    x-on:input="dataForm.nombres = dataForm.nombres.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- APELLIDOS -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Apellidos</label>
                <input
                    type="text"
                    x-model="dataForm.apellidos"
                    x-on:input="dataForm.apellidos = dataForm.apellidos.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- CORREO ELECTRÓNICO -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Correo Electrónico</label>
                <input
                    x-model="dataForm.email"
                    x-on:input="
                    dataForm.email = dataForm.email.replace(/[^a-zA-Z0-9@._%+\-]/g, '').slice(0, 50);
                    emailValido = validarEmail(dataForm.email);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos solo si hay contenido y no es válido -->
                <template x-if="dataForm.email !== '' && !emailValido">
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
                    x-model="dataForm.telefono"
                    x-on:input="
                    dataForm.telefono = dataForm.telefono.replace(/[^0-9]/g, '').slice(0, 10);
                    telefonoValido = validarTelefono(dataForm.telefono);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos si el usuario ya introdujo algo pero no cumple 10 dígitos -->
                <template x-if="dataForm.telefono !== '' && !telefonoValido">
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
                    x-model="dataForm.direccion"
                    x-on:input="dataForm.direccion = dataForm.direccion.slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- CATEGORIA -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Categoria</label>
                <select
                    x-model="dataForm.categoria"
                    class="w-full p-2 border rounded"
                    required>
                    <option value="">Selecciona una categoria</option>
                    <option value="medicamentos_farmaceuticos">Medicamentos y productos farmacéuticos</option>
                    <option value="alimentos_nutricion">Alimentos y nutrición</option>
                    <option value="accesorios_mascotas">Accesorios para mascotas</option>
                    <option value="limpieza_desinfeccion">Productos de limpieza y desinfección</option>
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
    <!-- Inicio del código para el contenedor (Cliente) -->
    <div x-show="tab === 'cliente'" class="p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold">Información de Cliente</h2>
        <form
            x-data="formCliente()"
            x-on:submit.prevent="submitForm"
            class="flex flex-col space-y-4">
            <!-- IDENTIFICACIÓN -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Identificación</label>
                <input
                    type="text"
                    x-model="dataForm.identificacion"
                    x-on:input="dataForm.identificacion = dataForm.identificacion.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- NOMBRES -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Nombres</label>
                <input
                    type="text"
                    x-model="dataForm.nombres"
                    x-on:input="dataForm.nombres = dataForm.nombres.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- APELLIDOS -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Apellidos</label>
                <input
                    type="text"
                    x-model="dataForm.apellidos"
                    x-on:input="dataForm.apellidos = dataForm.apellidos.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- CORREO ELECTRÓNICO -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Correo Electrónico</label>
                <input
                    x-model="dataForm.email"
                    x-on:input="
                    dataForm.email = dataForm.email.replace(/[^a-zA-Z0-9@._%+\-]/g, '').slice(0, 50);
                    emailValido = validarEmail(dataForm.email);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos solo si hay contenido y no es válido -->
                <template x-if="dataForm.email !== '' && !emailValido">
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
                    x-model="dataForm.telefono"
                    x-on:input="
                    dataForm.telefono = dataForm.telefono.replace(/[^0-9]/g, '').slice(0, 10);
                    telefonoValido = (dataForm.telefono.length === 10);
                "
                    class="w-full p-2 border rounded"
                    required>
                <!-- Alertamos si el usuario ya introdujo algo pero no cumple 10 dígitos -->
                <template x-if="dataForm.telefono !== '' && !telefonoValido">
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
                    x-model="dataForm.direccion"
                    x-on:input="dataForm.direccion = dataForm.direccion.slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
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

    <div x-show="tab === 'mascota'" class="p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold">Información de Mascota</h2>
        <form
            x-data="formMascota()"
            x-on:submit.prevent="submitForm"
            class="flex flex-col space-y-4">
            <!-- IDENTIFICACIÓN MASCOTA -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Identificación</label>
                <input
                    type="text"
                    x-model="dataForm.identificacion"
                    x-on:input="dataForm.identificacion = dataForm.identificacion.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- IDENTIFICACIÓN CLIENTE -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Identificación Cliente</label>
                <input
                    type="text"
                    x-model="dataForm.identificacion_cliente"
                    x-on:input="dataForm.identificacion_cliente = dataForm.identificacion_cliente.replace(/[^a-zA-Z0-9]/g, '').slice(0, 11)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- NOMBRES -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Nombres</label>
                <input
                    type="text"
                    x-model="dataForm.nombres"
                    x-on:input="dataForm.nombres = dataForm.nombres.replace(/[^a-zA-Z\s]/g, '').replace(/\s{2,}/g, ' ').slice(0, 50)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- PESO MASCOTA -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Peso</label>
                <div class="flex rounded-md shadow-sm">
                    <input
                        type="text"
                        x-model="dataForm.peso"
                        x-on:input="dataForm.peso = dataForm.peso.match(/^\d{0,5}(\.\d{0,2})?$/) ? dataForm.peso : dataForm.peso.slice(0, -1);"
                        class="flex-1 p-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <select
                        x-model="dataForm.unidad"
                        class="p-2 border border-l-0 rounded-r-md bg-gray-100 focus:outline-none">
                        <option value="">Selecciona una unidad</option>
                        <option value="GR">GR</option>
                        <option value="KG">KG</option>
                    </select>
                </div>
            </div>

            <!-- EDAD -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Edad</label>
                <input
                    type="text"
                    x-model="dataForm.edad"
                    x-on:input="dataForm.edad = dataForm.edad.replace(/[^0-9]/g, '').slice(0, 5)"
                    class="w-full p-2 border rounded"
                    required>
            </div>

            <!-- SEXO -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Sexo</label>
                <select
                    x-model="dataForm.sexo"
                    class="w-full p-2 border rounded"
                    required>
                    <option value="">Selecciona un tipo de sexo</option>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                </select>
            </div>

            <!-- TIPO DE MASCOTA -->
            <div class="w-1/3">
                <label class="block text-sm font-medium">Tipo de Mascota</label>
                <select
                    x-model="dataForm.tipo_mascota"
                    class="w-full p-2 border rounded"
                    required>
                    <option value="">Selecciona un tipo de mascota</option>
                    <option value="canino">Canino</option>
                    <option value="felino">Felino</option>
                    <option value="aves">Aves</option>
                    <option value="acuatico">Acuático</option>
                    <option value="reptil">Reptil</option>
                    <option value="mamífero">Mamífero</option>
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
    <!-- Fin del código para el contenedor de cada pestaña -->
</div>

<script>
    function sharedMethods() {
        return {

            // Devuelve los métodos y variables a sus componentes hijos o donde es llamado ...sharedMethods

            emailValido: false,
            telefonoValido: false,

            validarEmail(valor) {
                const regex = /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/;
                return regex.test(valor);
            },

            validarTelefono(valor) {
                return valor.length === 10;
            },

            async enviarDatos(url, datos) {
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(datos)
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        Swal.fire({
                            title: 'Error al guardar',
                            text: errorData.message || 'Error desconocido',
                            icon: 'error'
                        });
                        return;
                    }

                    const data = await response.json();
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Datos guardados exitosamente',
                        icon: 'success'
                    });

                } catch (error) {
                    console.error('Error en la petición:', error);
                    alert('Ocurrió un error inesperado.');
                }
            }
        }
    }

    function formVeterinario() {
        return {

            // Retorna variables y métodos para que sean utilizados en el formulario de forma reactiva

            ...sharedMethods(),
            dataForm: {
                identificacion: '',
                nombres: '',
                apellidos: '',
                email: '',
                telefono: '',
                direccion: '',
                especialidad: '',
                horario_atencion: '',
            },

            submitForm() {
                if (!this.validarTelefono(this.dataForm.telefono)) {
                    Swal.fire({
                        title: 'Teléfono no válido',
                        text: 'El teléfono debe tener 10 dígitos.',
                        icon: 'warning'
                    });
                    return;
                }
                if (!this.validarEmail(this.dataForm.email)) {
                    Swal.fire({
                        title: 'Correo no válido',
                        text: 'Ingrese un correo electrónico válido.',
                        icon: 'warning'
                    });
                    return;
                }

                this.enviarDatos('/api/veterinarios', this.dataForm);
            }
        }
    }

    function formProveedor() {
        return {
            ...sharedMethods(),
            dataForm: {
                identificacion: '',
                nombres: '',
                apellidos: '',
                email: '',
                telefono: '',
                direccion: '',
                categoria: '',
            },

            submitForm() {
                if (!this.validarTelefono(this.dataForm.telefono)) {
                    Swal.fire({
                        title: 'Teléfono no válido',
                        text: 'El teléfono debe tener 10 dígitos.',
                        icon: 'warning'
                    });
                    return;
                }
                if (!this.validarEmail(this.dataForm.email)) {
                    Swal.fire({
                        title: 'Correo no válido',
                        text: 'Ingrese un correo electrónico válido.',
                        icon: 'warning'
                    });
                    return;
                }

                this.enviarDatos('/api/proveedores', this.dataForm);
            }
        }
    }

    function formCliente() {
        return {
            ...sharedMethods(),
            dataForm: {
            identificacion: '',
            nombres: '',
            apellidos: '',
            email: '',
            telefono: '',
            direccion: '',
            },
            submitForm() {
                if (!this.validarTelefono(this.dataForm.telefono)) {
                    Swal.fire({
                        title: 'Teléfono no válido',
                        text: 'El teléfono debe tener 10 dígitos.',
                        icon: 'warning'
                    });
                    return;
                }
                if (!this.validarEmail(this.dataForm.email)) {
                    Swal.fire({
                        title: 'Correo no válido',
                        text: 'Ingrese un correo electrónico válido.',
                        icon: 'warning'
                    });
                    return;
                }

                this.enviarDatos('/api/clientes', this.dataForm);
            }
        }

    }

    function formMascota() {
        return {
            ...sharedMethods(),
            dataForm: {
                identificacion: '',
                identificacion_cliente: '',
                nombres: '',
                peso: '',
                unidad: '',
                edad: '',
                sexo: '',
                tipo_mascota: '',
            },

            submitForm() {
                this.enviarDatos('/api/mascotas', this.dataForm);
            }
        }

    }
</script>
@endsection
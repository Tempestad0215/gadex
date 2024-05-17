<script setup>
import Dashboard from '../Dashboard.vue';
import Error from '../../Partials/Error.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';


const props = defineProps({
    clients:{
        type: Object,
        required: true
    }
});


// Datos del formulario
const form = useForm({
    id: 0,
    name:"",
    last_name:"",
    email:"",
    phone:"",
    update: false
});

// Formulario de buscar
const formSearch = useForm({
    search:""
});



// Funciones

// Enviar el formulario
const submit = () => {
    if(form.update)
    {
        // Para actualizar un cliente
        form.put(`/client/update/${form.id}`,{
            onSuccess:()=>{
                // Limpiar todo
                form.reset();
                // Mensaje de extio
                Swal.fire({
                    icon: 'success',
                    text: 'Datos actualizados correctamente',
                    position: 'center',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        })

    }else{
        // Para agregar un cliente
        form.post('client/',{
            onSuccess:() => {
                Swal.fire({
                    icon: 'success',
                    text: 'Datos registrado correctamente',
                    position: 'center',
                    timer: 1500,
                    showConfirmButton: false
                });
                form.reset();
            }
        });
    }

}

// Buscar los datos del cliente
const search = () => {
    formSearch.get('/client/',{
        preserveScroll: true,
        preserveState: true
    });
}


// Editar
const edit = (data) =>{
    form.id = data.id;
    form.name = data.name;
    form.last_name = data.last_name;
    form.email = data.email;
    form.phone = data.phone;
    form.update = true;
}


// Eliminar el cliente
const destroy = (id) => {
    Swal.fire({
        title: "Desea eliminar?",
        text: "Los cambios realizados son irreversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!"
    }).then((result) => {
    if (result.isConfirmed) {

        // Enviar a elimianr el cliente
        router.put(`/client/destroy/${id}`,{},{
            onSuccess:()=>{
                // Limpiar el formulario
                form.reset();
                // Mensaje de exito
                Swal.fire({
                    title: "Eliminado!",
                    text: "El cliente selecciona ha sido eliminado",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton:false
                });
            }
        })


    }
    });
}


</script>



<template>
    <Dashboard>

        <!-- Cabecera de la pagina -->
        <template #header>


        </template>


        <!-- Contenido de la ventana -->
        <div>

            <h3
                class=" titulo">
                Registro de cliente
            </h3>
            <!-- Formulario para agregar el cliente -->
            <form
                class=" my-5"
                @submit.prevent="submit">

                <div class=" flex flex-row justify-between gap-3">
                    <!-- Nombre -->
                    <div class=" w-full">
                        <label
                            for="name"
                            class="label block">
                            Nombre
                        </label>
                        <input
                            name="name"
                            v-model="form.name"
                            placeholder="Jose Antonio"
                            type="text"
                            class="input w-full">
                        <!-- Error de la ventana -->
                        <Error :data="form.errors.name"/>
                    </div>
                    <!-- Apellido -->
                    <div class=" w-full">
                        <label
                            for="last_name"
                            class="label block">
                            Apellido
                        </label>
                        <input
                            v-model="form.last_name"
                            name="last_name"
                            placeholder="Perez Vasquez"
                            type="text"
                            class="input w-full ">
                        <!-- Error de la ventana -->
                        <Error :data="form.errors.last_name"/>
                    </div>
                    <!-- Correo -->
                    <div class=" w-full">
                        <label
                            for="email"
                            class="label block">
                            Correo
                        </label>
                        <input
                            v-model="form.email"
                            name="email"
                            placeholder="jose@jose.com"
                            type="email"
                            class="input w-full ">
                        <!-- Error de la ventana -->
                        <Error :data="form.errors.email"/>
                    </div>
                    <!-- Telefono -->
                    <div class=" w-full">
                        <label
                            for="phone"
                            class="label block">
                            Telefono
                        </label>
                        <input
                            v-model="form.phone"
                            name="phone"
                            placeholder="+1 829-563-4532"
                            type="text"
                            class="input w-full ">
                        <!-- Error de la ventana -->
                        <Error :data="form.errors.phone"/>
                    </div>

                </div>


                <!-- Botones para limpiar y guardar -->
                <div
                    class="mt-5 space-x-5 text-right">
                    <button
                        class="btn-send"
                        type="reset">
                        Limpiar
                    </button>
                    <button
                        class="btn-send"
                        type="submit">
                        Registrar
                    </button>
                </div>


            </form>

            <hr>
            <!-- Linea divisora -->
            <div>
                <!-- Tabla para mostrar los clientes registrados -->
                <h3 class="titulo">
                    Tabla
                </h3>

                <!-- Buscador del cliente -->
                <div>
                    <label
                        for="search"
                        class="label block">
                        Buscar
                    </label>
                    <div class=" relative max-w-[350px]">
                        <input
                            v-model="formSearch.search"
                            placeholder="Busqueda"
                            type="text"
                            class="input w-[300px]">

                        <!-- Boton de busqueda -->

                        <i
                            @click="search"
                            class=" text-2xl absolute right-0 bg-fondob hover:bg-azulp hover:text-blanco duration-300 px-3 inset-y-0 flex items-center rounded-full fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <!-- Tabla de los clientes -->
                <table class=" table-auto w-full ">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr class="border-b-2 text-left">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Atc</th>
                        </tr>
                    </thead>

                    <!-- Contenido de la tabla -->
                    <tbody>
                        <tr
                            class=" odd:bg-fondob hover:bg-azulc group"
                            v-for="(item, index) in clients.data">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.last_name }}</td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.phone }}</td>
                            <td class=" text-xl space-x-3 text-center">
                                <!-- Editar -->
                                <i
                                    @click="edit(item)"
                                    class=" text-azulm hover:scale-125 duration-300 group-hover:text-azulp fa-regular fa-pen-to-square"></i>
                                <!-- Eliminar -->
                                <i
                                    @click="destroy(item.id)"
                                    class=" text-error fa-solid fa-trash-can"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <!-- Paginacion de la tabla -->
                <div class=" flex justify-between mt-3">

                    <!-- Informacion que se muestra -->
                    <div>
                        <!-- Pagina actual -->
                        <span>
                            <strong>
                                Pagina:
                            </strong>
                            {{ clients.current_page }}
                        </span>
                        |
                        <!-- Por pagina -->
                        <span>
                            <strong>
                                Total mostrado:
                            </strong>
                            {{ clients.to }}
                        </span>
                    </div>


                    <!-- Link de navegacion -->
                    <div class=" text-3xl space-x-5">
                        <!-- Atras -->
                        <Link
                            preserve-scroll
                            preserve-state
                            :href="clients.prev_page_url || ''" >
                            <i class="text-azulm hover:text-azulp duration-300 fa-solid fa-circle-arrow-left"></i>
                        </Link>
                        <!-- Adelante -->
                        <Link
                            preserve-scroll
                            preserve-state
                            :href="clients.next_page_url || ''  ">
                            <i class=" text-azulm hover:text-azulp duration-300  fa-solid fa-circle-arrow-right"></i>
                        </Link>
                    </div>
                </div>
            </div>

        </div>


    </Dashboard>


</template>

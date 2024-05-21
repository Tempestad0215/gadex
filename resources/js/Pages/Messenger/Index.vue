<script setup>
import { router, useForm } from '@inertiajs/vue3';
import Dashboard from '../Dashboard.vue';
import FormSearch from '@/Partials/FormSearch.vue';
import Swal from 'sweetalert2';
import Error from '@/Partials/Error.vue';
import Pagination from '@/Partials/Pagination.vue';


const props = defineProps({
    messengers:{
        type: Object,
        required: true
    }
});


// Datos del formulario
const form = useForm({
    id:"",
    name:"",
    last_name:"",
    phone:"",
    email:"",
    company:"",
    company_phone:"",
    search:"",
    update: false
});



// funciones
const search = () => {
    router.get(`/messenger?search=${form.search}`,{},{
        preserveScroll: true,
        preserveState: true
    });
}

// Enviar el formulario
const submit = () => {

    if(form.update)
    {
        form.put(`/messenger/update/${form.id}`,{
            onSuccess:()=>{
                // Limpiar el formulario
                form.reset();
                // Mensaje de exito
                Swal.fire({
                    title: "Actualizado!",
                    text: "El mensajero fue actualizado correctamente",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton:false
                });
            }
        })
    }else{
        form.post('/messenger',{
            onSuccess:()=>{
                // Limpiar el formulario
                form.reset();
                // Mensaje de exito
                Swal.fire({
                    title: "Registrado!",
                    text: "El mensajero fue registrado correctamente",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton:false
                });
            }
        });
    }

}

// Editar los datos
const edit = (item) =>{

    // Pasar los datos al formulario para editar
    form.id = item.id;
    form.name = item.name;
    form.last_name = item.last_name;
    form.phone = item.phone;
    form.email = item.email;
    form.company = item.company;
    form.company_phone  = item.company_phone ;
    form.update = true;
}


// Eliminar los datos
const destroy = (id) =>{

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
            // Quitar el uisuario de circulacion
            router.put(`/messenger/destroy/${id}`,{},{
            onSuccess:()=>{
                // Mensaje de exito
                Swal.fire({
                        title: "Eliminado!",
                        text: "El mensajero fue eliminado correctamente",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton:false
                    });
            }
        })
    }});
}


</script>


<!-- Contenido de la ventana -->
<template>
    <Dashboard>
        <!-- Header  -->
        <template #header>

        </template>


        <!-- Contenido de la venta -->
        <div>
            <!-- Titulo de la ventana -->
            <h3
                class="titulo" >
                Mensajeros
            </h3>

            <!-- Formulario -->
            <form
                @submit.prevent="submit"
                class="mb-5" >
                <div class=" grid grid-cols-2 gap-3">
                    <!-- Nombre -->
                    <div class="">
                        <label
                            for="name"
                            class="label block">
                            Nombre
                        </label>
                        <input
                            v-model="form.name"
                            type="text"
                            class="input  w-full">
                        <!-- Error -->
                        <Error :data="form.errors.name" />
                    </div>

                    <!-- Apellido -->
                    <div class=" w-full">
                        <label
                            for="name"
                            class="label block">
                            Apellido
                        </label>
                        <input
                            v-model="form.last_name"
                            type="text"
                            class="input w-full">

                        <!-- Error -->
                        <Error :data="form.errors.last_name" />
                    </div>

                    <!-- Telefono -->
                    <div class=" w-full">
                        <label
                            for="email"
                            class="label block">
                            Telefono
                        </label>
                        <input
                            name="email"
                            v-model="form.phone"
                            type="tel"
                            class="input w-full">

                        <!-- Error -->
                        <Error :data="form.errors.phone" />
                    </div>


                    <!-- Telefono -->
                    <div class=" w-full">
                        <label
                            for="email"
                            class="label block">
                            Correo
                        </label>
                        <input
                            name="email"
                            v-model="form.email"
                            type="email"
                            class="input w-full">

                        <!-- Error -->
                        <Error :data="form.errors.email" />
                    </div>

                    <!-- Compa;ia -->
                    <div class=" w-full">
                        <label
                            for="company"
                            class="label block">
                            Empresa
                        </label>
                        <input
                            name="company"
                            v-model="form.company"
                            type="text"
                            class="input w-full">

                        <!-- Error -->
                        <Error :data="form.errors.company" />
                    </div>

                    <!-- Compa;ia telefono -->
                    <div class=" w-full">
                        <label
                            for="company_phone"
                            class="label block">
                            Empresa Telefono
                        </label>
                        <input
                            name="company_phone"
                            v-model="form.company_phone"
                            type="tel"
                            class="input w-full">

                        <!-- Error -->
                        <Error :data="form.errors.company_phone" />
                    </div>

                </div>


                <!-- Botones para enviar los datos -->
                <div class="  mt-5 text-right  space-x-5">
                    <!-- Limpiar el formulario -->
                    <button
                        class=" btn-send"
                        type="reset">
                        Limpiar
                    </button>

                    <!-- Registrar los daots -->
                    <button
                        class="btn-send"
                        type="submit">
                        Registrar
                    </button>
                </div>

            </form>

            <!-- Linea divisora -->
            <hr>
            <!-- conentido de la ventana -->
            <div>

                <FormSearch
                    @searchData="search"
                    v-model="form.search" />
                <!-- contenido de la ventana -->
                <table class=" w-full table-auto">

                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr class=" text-left">
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Empresa</th>
                            <th>Emp. Telefono</th>
                            <th>Atc</th>
                        </tr>
                    </thead>

                    <!-- Contenido de la tabla -->
                    <tbody>
                        <tr
                            v-for="(item, index) in messengers.data"
                            class=" odd:bg-fondob hover:bg-azulc group">
                            <td>{{ item.id }}</td>
                            <td>{{item.name}}</td>
                            <td>{{item.last_name}}</td>
                            <td>{{item.email}}</td>
                            <td>{{item.phone}}</td>
                            <td>{{item.company}}</td>
                            <td>{{item.company_phone }}</td>


                            <!-- Botones de todo -->
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

                <!-- PAginacion de los datos -->
                <Pagination
                    :currentPage="messengers.current_page"
                    :total="messengers.to"
                    :prev="messengers.prev_page_url"
                    :next="messengers.next_page_url" />

            </div>
        </div>
    </Dashboard>
</template>

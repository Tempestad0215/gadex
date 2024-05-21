<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import Swal from 'sweetalert2';




const logOut = () =>{
    Swal.fire({
        title: "Salir?",
        text: "Seguro desea cerrar sesion ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, cerrar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            router.post('/logout');
        }
    });

}

</script>




<template>
    <!-- Contenido de la ventana -->
    <div class=" flex h-screen bg-fondo">
        <!-- Barra latera -->
        <div class=" w-[200px] border-r-2 border-blue-300 ">

            <!-- Informacion de la empresa -->
            <div class="py-3" >
                <img
                    class=" mx-auto"
                    width="150"
                    src="../../../public/storage/images/gadexp.png"
                    alt="logo de la empresa Gadex">
            </div>


            <!-- Nombre de usuario y cargo -->
            <div class=" text-center mb-3 border-b-2 pb-3">
                <h4 class=" text-xl font-bold max-w-[120px] mx-auto truncate">
                    {{ $page.props.auth.user.name }}
                </h4>
                <p class=" text-xs -mt-2">
                    (Recepcion)
                </p>
            </div>



            <!-- Manu de navegacion -->
            <div class="" >


                <!-- Entrada de docuemtno -->
                <Link
                    class="link-nav"
                    href="/" >
                    Tablero
                </Link>


                <!-- Entrada de docuemtno -->
                <Link
                    class="link-nav"
                    href="/client" >
                    Cliente
                </Link>

                <!-- Entrada de docuemtno -->
                <Link
                    class="link-nav"
                    href="/messenger" >
                    Mensajeros
                </Link>


                <!-- Entrada de docuemtno -->
                <Link
                    class="link-nav"
                    href="/" >
                    Entrada
                </Link>


                <!-- Salida de documento -->
                <Link
                    class="link-nav"
                    href="/" >
                    Salida
                </Link>


                <!-- Envio -->
                <Link
                    class="link-nav"
                    href="/" >
                    Envios
                </Link>


                <!-- Entrada de cheque -->
                <Link
                    class="link-nav"
                    href="/" >
                    Cheques Entr.
                </Link>
            </div>
        </div>
        <!-- Contenido de la ventanae -->
        <div class=" flex-1 flex flex-col ">
            <!-- Cabecera -->
            <div class=" h-[65px] relative border-b-2 border-blue-800 ">


                <slot name="header" ></slot>

                <!-- Boton para salir -->
                <div class=" absolute right-0 inset-y-0 pr-5 flex items-center" >
                    <i
                        @click="logOut"
                        class="fa-solid fa-arrow-right-from-bracket text-3xl float-right text-azulm hover:text-azulp duration-300 "></i>
                </div>
            </div>
            <hr>


            <!-- Contenido de la ventanae -->
            <div class=" flex-1 p-5">
                <slot></slot>
            </div>

        </div>
    </div>


</template>

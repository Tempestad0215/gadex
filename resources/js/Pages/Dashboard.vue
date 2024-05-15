<script setup>
import {Head} from '@inertiajs/vue3';



</script>




<template>
    <!-- Titulo de la ventana -->
    <Head title="Dashboard" />

    <!-- Contenido de la ventana -->
    <div class=" flex h-screen">
        <!-- Barra latera -->
        <div class=" bg-blue-400 col-span-2 w-[200px] ">

            <!-- Informacion de la empresa -->
            <div class="py-3" >
                <img
                    class=" mx-auto"
                    width="100"
                    src="../../../public/storage/images/logogadex.png"
                    alt="logo de la empresa Gadex">
            </div>


            <!-- Nombre de usuario y cargo -->
            <div class=" text-center">
                <h4 class=" text-xl font-bold">
                    Marionil G.
                </h4>
                <span class=" text-sm -pt-2">
                    (Recepcion)
                </span>
            </div>
            <div>

            </div>
            <hr>
            barra lateral
        </div>
        <!-- Contenido de la ventanae -->
        <div class=" flex-1 flex flex-col ">
            <!-- Cabecera -->
            <div class=" bg-red-200 h-[65px] relative  ">


                cabecera

                <div class=" absolute right-0 inset-y-0 pr-5 flex items-center" >
                    <i
                        class="fa-solid fa-arrow-right-from-bracket text-3xl float-right "></i>
                </div>
            </div>


            <!-- Contenido de la ventanae -->
            <div class=" bg-green-200 flex-1 p-5">
                prueba
            </div>

        </div>
    </div>


</template>

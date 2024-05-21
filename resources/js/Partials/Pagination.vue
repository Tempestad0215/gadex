<script setup>
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    currentPage:{
        type: Number,
        required: true
    },
    total:{
        type: Number,
        required: true
    },
    prev:{
        type: Number,
    },
    next:{
        type: Number,
    }
});


</script>


<!-- contenido de la ventana -->
<template>

    <!-- Paginacion de la tabla -->
    <div class=" flex justify-between mt-3">

        <!-- Informacion que se muestra -->
        <div>
            <!-- Pagina actual -->
            <span>
                <strong>
                    Pagina:
                </strong>
                {{ currentPage }}
            </span>
            |
            <!-- Por pagina -->
            <span>
                <strong>
                    Total mostrado:
                </strong>
                {{ total }}
            </span>
        </div>


        <!-- Link de navegacion -->
        <div class=" text-3xl space-x-5">
            <!-- Atras -->
            <Link
                preserve-scroll
                preserve-state
                :href="prev || ''" >
                <i class="text-azulm hover:text-azulp duration-300 fa-solid fa-circle-arrow-left"></i>
            </Link>
            <!-- Adelante -->
            <Link
                preserve-scroll
                preserve-state
                :href="next || ''  ">
                <i class=" text-azulm hover:text-azulp duration-300  fa-solid fa-circle-arrow-right"></i>
            </Link>
        </div>
    </div>


</template>

<script setup>

const props  = defineProps(['modelValue'])


// enviar los dato por el input
const emit = defineEmits(['update:modelValue','searchData']);

// Funciones
const search = () =>{
    emit('searchData');
}



</script>


<!-- Cobntendio de la ventanas -->
<template>
    <!-- Buscador del cliente -->
    <div>
        <label
            for="search"
            class="label block">
            Buscar
        </label>
        <!-- Formulario  de busqueda -->
        <div class=" relative max-w-[350px]">
            <input
                @input="emit('update:modelValue', $event.target.value)"
                :value="modelValue"
                placeholder="Busqueda"
                type="text"
                class="input w-[300px]">

            <!-- Boton de busqueda -->

            <i
                @click="search"
                class=" text-2xl absolute right-0 bg-fondob hover:bg-azulp hover:text-blanco duration-300 px-3 inset-y-0 flex items-center rounded-full fa-solid fa-magnifying-glass"></i>
        </div>
    </div>


</template>

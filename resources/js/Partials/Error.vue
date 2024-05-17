<script setup>

const props = defineProps({
    data:{
        type: String,
    }
})


</script>


<!-- Contenido de la ventana -->
<template>
    <!-- Mostrar solo si existe la data -->
    <div
        class=" text-sm text-error"
        v-if="data">
        <i class="fa-solid fa-triangle-exclamation"></i>
        {{ data }}
    </div>

</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';



// formulario para el envio de todo
const form = useForm({
    email:"",
    password:"",
    remember: false
});


// Enviar el formulario
const submit = () =>{
    form.post('/login',{
        onSuccess:()=>{
            console.log('enviado');
        },
        onError:()=>{
            console.log('error');
        }
    })
}


</script>

<template>
    <Head title="Login" />

    <!-- Contenido de la ventana -->
    <div
        class="login-container">

        <!-- Contenido del formulario -->
        <div
            class=" bg-white min-h-svh  lg:max-w-md rounded-lg p-6 shadow-lg bg-opacity-60 ">
            <div>
                <h3 class=" text-3xl font-bold text-center ">
                    Login
                </h3>
                <div>
                    <img
                        class=" mx-auto"
                        width="150"
                        src="../../../public/storage/images/logogadex.png"
                        alt="logo de la empresa">
                </div>
            </div>
            <form
                @submit.prevent="submit">
                <!-- Email del usaurio -->
                <div>
                    <label
                        class="label block"
                        for="email">
                        Email
                    </label>
                    <input
                        v-model="form.email"
                        class="input w-full"
                        type="email" required >
                </div>

                <!-- Password de uisuario -->
                <div class=" mt-3">
                    <label
                        class="label block"
                        for="password">
                        Password
                    </label>
                    <input
                        v-model="form.password"
                        class="input w-full"
                        type="password">
                </div>


                <!-- Recordar el usuiario -->
                <div class=" mt-5">
                    <input
                        v-model="form.remember"
                        class=" hidden peer"
                        type="checkbox"
                        name="remember"
                        id="remember">
                    <label
                        class=" peer-checked:text-white peer-checked:bg-blue-800 bg-blue-300 py-1.5 rounded-2xl px-3 duration-300 font-bold "
                        for="remember">
                        Remember me
                    </label>
                </div>


                <!-- Botones de usuario -->
                <div class="mt-3 text-right">
                    <button
                        class="btn-send"
                        type="submit">
                        Sing in
                    </button>
                </div>


            </form>
        </div>
    </div>
</template>

<template>
    <PrincipalLayout>
        <template #header>
                <h1 class="text-8xl my-5">Acortador URL</h1>
                <!-- <h3 class="text-4xl my-5">Acorta tus enlaces en segundos</h3> -->
                <h5 class="text-2xl my-5">Convierte tus enlaces en herramientas poderosas con nuestro amigable acortador de URL.
                    Comparte enlaces cortos, confiables y fáciles de rastrear, y conecta con tu audiencia de manera rápida y sencilla.</h5>
        </template>
        <Steps/>
            <form @submit.prevent="submit" class="flex ">
                <input type="text" v-model="form.url" id="url" required class="rounded w-full h-xl bg-transparent border-2 border-primary placeholder:text-slate-400 p-2" placeholder="https://...">
                <!-- <n-input round placeholder="https://" v-model="form.url">
<template #suffix>
    <n-button @click="submit" type="submit">
        Acortar
    </n-button>
</template>

</n-input> -->
                <button type="submit" class="p-3 bg-primary text-tertiary rounded-r ">Acortar</button>
            </form>
            <div class="my-2 ">
                <div v-if="message" class="alert alert text-red-600">
                    {{ message }}
                </div>
                <button v-if="shortUrl" @click="copy" class="mt-2 text-black bg-tertiary w-fit p-3 rounded-full hover:bg-primary hover:text-tertiary">
                    {{ fullUrl }}
                    <!-- <p>¡Tu URL corta es: <a :href="fullUrl" target="_blank" class="p-2 text-secondary underline decoration-solid"></a></p> -->

                </button>
                <div v-if="copyMessage" class="text-primary">
            {{ copyMessage }}
        </div>
            </div>
    </PrincipalLayout>
</template>

<script>
import { defineComponent, computed } from 'vue';
import { NInput } from 'naive-ui';
import { useForm } from '@inertiajs/vue3';
import PrincipalLayout from '@Layouts/PrincipalLayout.vue';
import Steps from '@Components/Steps.vue';

export default defineComponent({
    props: {
        message: String,
        shortUrl: String,
    },
    data() {
        return {
            url: '',
            copyMessage: ''
        };
    },
    components: {
        NInput,
        PrincipalLayout,
        Steps
    },
    setup(props) {
        // Inicializar el formulario
        const form = useForm({
            url: ''
        });

        // Función para enviar el formulario
        const submit = () => {
            form.post('shorten-url');
        };
        const fullUrl = computed(() => {
            return props.shortUrl ? `${window.location.origin}/${props.shortUrl}` : '';
        });
        const copy = () =>{
            navigator.clipboard.writeText(fullUrl);
            console.log("props ",props.copyMessage)
            copyMessage = "¡Enlace copiado!";
                console.log("text ",copyMessage)
            // try {
            //     await navigator.clipboard.writeText(fullUrl);

            //     props.copyMessage = "¡Enlace copiado!";
            //     console.log("text ",props.copyMessage)

            //     // setTimeout(() => {
            //     //     copyMessage = '';
            //     // }, 3000);
            // } catch (err) {
            //     props.copyMessage = "Hubo un error al copiar el enlace.";
            //     // setTimeout(() => {
            //     //     copyMessage = '';
            //     // }, 3000);
            // }
        };

        return {
            form,
            submit,
            fullUrl,
            copy,

        };

    }
});
</script>

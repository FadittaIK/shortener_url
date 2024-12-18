<template>
    <PrincipalLayout>
        <template #header>
            <h1 class="text-8xl">Acortador URL</h1>
            <h3 class="text-4xl">Transforma tus largos enlaces en versiones compactas</h3>
            <h5 class="text-2xl">Simplifica tus URLs y hazlas más fáciles de compartir.</h5>
        </template>
        <Steps/>
            <form @submit.prevent="submit" class="flex ">
                <input type="text" v-model="form.url" id="url" required class="rounded w-full h-xl placeholder:text-slate-400 p-2" placeholder="https://...">
                <!-- <n-input round placeholder="https://" v-model="form.url">
                  <template #suffix>
                    <n-button @click="submit" type="submit">
                      Acortar
                    </n-button>
                  </template>
</n-input> -->
                <button type="submit" class="p-2 bg-black text-white">Acortar</button>
            </form>
            <div v-if="message" class="alert alert">
                {{ message }}
            </div>
            <div v-if="shortUrl" class="alert alert">
                <p>¡Tu URL corta es:</p>
                <a :href="fullUrl" target="_blank">{{ fullUrl }}</a>
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
        shortUrl: String
    },
    data() {
        return {
            url: '',
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

        return {
            form,
            submit,
            fullUrl
        };

    }
});
</script>

<style lang="">
  /* Estilos opcionales */
  </style>

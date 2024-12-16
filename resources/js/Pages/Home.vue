<template>
    <div>
      <header>
        <h1>Acortador URL</h1>
        <h5>text</h5>
      </header>
      <form @submit.prevent="submit">
        <input type="text" v-model="form.url" id="url" required>
        <!-- <n-input round placeholder="https://" v-model="form.url">
          <template #suffix>
            <n-button @click="submit" type="submit">
              Acortar
            </n-button>
          </template>
        </n-input> -->
        <button type="submit">Acortar</button>
      </form>
    </div>
  </template>

  <script>
  import { defineComponent } from 'vue';
  import { NInput } from 'naive-ui';
  import { useForm } from '@inertiajs/vue3';
import { fromJSON } from 'postcss';

  export default defineComponent({
    components: {
      NInput
    },
    setup() {
      // Inicializar el formulario
      const form = useForm({
        url: ''
      });

      // Función para enviar el formulario
      const submit = () => {
        console.log(form.url);
        form.post('/url'); // Utilizando `form.post` para enviar los datos
      };

      return {
        form,
        submit
      };
    }
  });
  </script>

  <style lang="">
  /* Estilos opcionales */
  </style>

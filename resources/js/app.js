//import './bootstrap';

import '../css/app.css';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { create } from 'naive-ui'; // Importar Naive UI

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob("./Pages/**/*.vue", { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const naive = create(); // Crear instancia de Naive UI
    createApp({ render: () => h(App, props) })
      .use(plugin)
      //.use(naive) // Registrar Naive UI globalmente
      .mount(el)
  },
})

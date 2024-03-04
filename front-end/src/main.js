import { createApp } from 'vue'
// import './style.css'
import App from './App.vue'
// importazione delle rotte 
import { router } from './router';
// ricordarsi di mettere use route nella create
createApp(App).use(router).mount('#app')

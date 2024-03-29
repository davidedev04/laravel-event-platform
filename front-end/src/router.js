import { createRouter, createWebHistory } from "vue-router";
// importazione file per rotte 
import AppAbout from "./pages/AppAbout.vue";
import AppHome from "./pages/AppHome.vue";
import AppTags from "./pages/AppTags.vue";
 
// creazione delle rotte e il loro 'percorso'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: AppHome
    },
    {
      path: "/about",
      name: "about",
      component: AppAbout
    },
    {
      path: "/tags",
      name: "tags",
      component:AppTags
    },
  ],
});
export { router };

import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import UserWeatherView from "../views/UserWeatherView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "Home",
      component: HomeView,
      children: [
        {
          path: "/user/:id",
          name: "UserWeatherView",
          component: UserWeatherView,
          props: true,
        }
      ]
    },
  ],
});

export default router;

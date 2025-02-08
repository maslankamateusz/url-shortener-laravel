import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ShortenerView from "../views/ShortenerView.vue";
import ExpandView from "../views/ExpandView.vue";

const routes = [
  { path: "/", component: HomeView },
  { path: "/shorten", component: ShortenerView },
  { path: "/expand", component: ExpandView },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

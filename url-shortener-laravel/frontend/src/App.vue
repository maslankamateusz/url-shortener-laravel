<script setup lang="ts">
import { RouterView } from 'vue-router'
import Navbar from "./components/Navbar.vue";
</script>

<template>
  <div>
    <Navbar />
    <router-view />
  </div>
</template>

<style scoped>


@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;
    padding: 1rem 0;
    margin-top: 0rem;
  }
}
</style>

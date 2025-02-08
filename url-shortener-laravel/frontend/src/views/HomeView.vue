<script setup lang="ts">
import TheWelcome from '../components/TheWelcome.vue'
</script>

<template>
  <div>
    <h1>Welcome to Vue URL Shortener</h1>
    <p><router-link to="/shorten">Go to Shortener</router-link></p>
    <p><router-link to="/expand">Expand a Shortened URL</router-link></p>
  </div>
</template>


<script setup>
import { ref } from "vue";
import axios from "axios";

const url = ref("");
const shortUrl = ref(null);
const error = ref(null);
const shortCode = ref(null);

const shortenUrl = async () => {
  error.value = null;
  shortUrl.value = null;
  shortCode.value = null;

  try {
    const response = await axios.post("http://127.0.0.1:8000/api/shorten", { url: url.value });
    shortUrl.value = response.data.shortened_url;
    shortCode.value = shortUrl.value.split("/").pop();
    shortUrl.value = `http://127.0.0.1:8000/go/${shortCode.value}`;
  } catch (err) {
    error.value = "Invalid URL or server error";
  }
};
</script>

<template>
  <div class="container">
    <h2>URL Shortener</h2>
    <input v-model="url" placeholder="Enter URL" />
    <button @click="shortenUrl">Shorten</button>

    <div class="shortened-url" v-if="shortUrl">
      <p>Shortened code: <b>{{ shortCode }}</b></p>
      <p>Shortened URL: <a :href="shortUrl" target="_blank">{{ shortUrl }}</a></p>
    </div>

    <p v-if="error">{{ error }}</p>
  </div>
</template>

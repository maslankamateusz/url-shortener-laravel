<script setup>
import { ref } from "vue";
import axios from "axios";

const shortCode = ref("");
const originalUrl = ref(null);
const error = ref(null);

const expandUrl = async () => {
  error.value = null;
  originalUrl.value = null;

  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/expand/${shortCode.value}`);
    originalUrl.value = response.data.original_url;
  } catch (err) {
    error.value = "Invalid short code or not found.";
  }
};
</script>

<template>
  <div class="container">
    <h2>Expand URL</h2>
    <input v-model="shortCode" placeholder="Enter Shortened Code" />
    <button @click="expandUrl">Expand</button>

    <div v-if="originalUrl">
      <p>Original URL: 
        <a :href="originalUrl" target="_blank" rel="noopener noreferrer">
          {{ originalUrl }}
        </a>
      </p>
    </div>

    <p v-if="error">{{ error }}</p>
  </div>
</template>

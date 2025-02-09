<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const links = ref([]);
const error = ref(null);

const fetchLinks = async () => {
  try {
    const response = await axios.get("http://127.0.0.1:8000/api/links");
    links.value = response.data;
  } catch (err) {
    error.value = "Failed to load links.";
  }
};

onMounted(fetchLinks);
</script>

<template>
  <div class="container">
    <h2>Shortened Links</h2>
    <p v-if="error" class="error">{{ error }}</p>
    <table v-if="links.length" class="link-table">
      <thead>
        <tr>
          <th>Short Code</th>
          <th>Original URL</th>
          <th>Shortened Link</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="link in links" :key="link.short_code">
          <td>{{ link.short_code }}</td>
          <td><a :href="link.original_url" target="_blank">{{ link.original_url }}</a></td>
          <td><a :href="'http://127.0.0.1:8000/go/' + link.short_code" target="_blank">http://127.0.0.1:8000/go/{{ link.short_code }}</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style>
.container {
  max-width: 800px;
  margin: auto;
  padding: 20px;
  text-align: center;
}

.link-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.link-table th, .link-table td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

.link-table th {
  background-color: #f4f4f4;
}

.error {
  color: red;
}
</style>

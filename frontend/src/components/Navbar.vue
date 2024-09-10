<script setup>
import { ref } from "vue";
const search = ref("");
</script>

<template>
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3">
      <div class="flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-gray-800">Hotel Finder</a>
        <div class="flex items-center space-x-4">
          <input
            type="text"
            placeholder="Search hotels..."
            class="border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:border-blue-500"
            v-model="search"
          />
          <button class="bg-sky-600 text-white px-3 py-1 rounded-lg font-bold">
            Search
          </button>
        </div>
      </div>
    </div>
  </nav>
</template>


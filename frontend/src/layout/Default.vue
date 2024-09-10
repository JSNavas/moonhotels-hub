<template>
  <header>
    <!-- <Navbar /> -->
    <nav class="bg-white shadow-md">
      <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
          <a href="#" class="text-2xl font-bold text-gray-800">Hotel Finder</a>
          <div class="flex items-center space-x-4">
            <input
              type="text"
              placeholder="Search hotels..."
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
            />
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md">
              Search
            </button>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="flex-grow p-4 flex flex-col">
    <slot name="page"></slot>
  </main>
</template>

<script setup>
import Navbar from "./../components/Navbar.vue";
</script>

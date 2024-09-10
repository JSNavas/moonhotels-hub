<template>
  <header>
    <Navbar />
  </header>

  <main class="flex-grow p-4 flex flex-col">
    <slot name="page"></slot>
  </main>
</template>

<script setup>
import Navbar from "./../components/Navbar.vue";
</script>


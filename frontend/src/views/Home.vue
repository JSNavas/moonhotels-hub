<template>
  <div class="container mx-auto px-6 py-10 flex space-x-6">
    <!-- Filters Section -->
    <AsideComponent />

    <!-- Main Content Section -->
    <main class="w-3/4">
      <SectionsFilterComponent />

      <h2 class="text-2xl font-semibold mb-4">Available Rooms</h2>

      <!-- Room Cards -->
      <CardComponent />
    </main>
  </div>
</template>

<script setup lang="ts">
import SectionsFilterComponent from "../components/SectionsFilterComponent.vue";
import CardComponent from "../components/CardComponent.vue";
import AsideComponent from "../components/AsideComponent.vue";
import { useCounterStore } from "../stores/counter";
import { computed } from "vue";
import { storeToRefs } from "pinia";
const store = useCounterStore();

const { name } = storeToRefs(store);

setTimeout(() => {
  store.increment();
}, 1000);

const doubleValue = computed(() => store.doubleCount);

console.log(doubleValue.value, name.value);
</script>

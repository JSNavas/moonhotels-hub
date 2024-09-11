<script setup lang="ts">
import { computed, ref } from "vue";
import { Room } from "../types";

const props = defineProps<{
  room: Room;
}>();

const price = ref();

const getRates = computed(() => {
  return props.room.rates.map((rate) => {
    return {
      rate: rate.price,
    };
  });
});
price.value = getRates.value[0].rate;
</script>

<template>
  <div class="grid grid-cols-1 gap-4">
    <div class="bg-white p-4 rounded-md shadow-md">
      <img
        src="https://via.placeholder.com/400x250"
        alt="Room Image"
        class="w-full h-48 object-cover rounded-md"
      />
      <div class="mt-4">
        <h3 class="text-xl font-semibold">Luxury Suite</h3>
        <p class="text-gray-600">Price: {{ price }} / night</p>
        <p class="text-yellow-500">★★★★★</p>
        <p class="text-gray-600 mt-2">
          Located in downtown, with free WiFi, a pool, and more amenities.
        </p>
        <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-md">
          View Details
        </button>
      </div>
    </div>
  </div>
</template>

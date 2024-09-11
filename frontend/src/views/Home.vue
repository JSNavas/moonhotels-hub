<template>
  <div class="container mx-auto px-6 py-10 flex space-x-6">
    <!-- Filters Section -->
    <AsideComponent />

    <!-- Main Content Section -->
    <main class="w-3/4">
      <SectionsFilterComponent />

      <h2 class="text-2xl font-semibold mb-4">Available Rooms</h2>

      <!-- Room Cards -->
      <div class="grid grid-cols-3 gap-4">
        <div v-for="room in rooms" :key="room.roomId">
          <CardComponent :room="room" />
        </div>
      </div>
    </main>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { storeToRefs } from "pinia";
import AsideComponent from "../components/AsideComponent.vue";
import CardComponent from "../components/CardComponent.vue";
import SectionsFilterComponent from "../components/SectionsFilterComponent.vue";

import { useRoomsStore } from "../stores/rooms";

const roomsStore = useRoomsStore();
const { rooms } = storeToRefs(roomsStore);
console.log(rooms.value);
onMounted(() => {
  roomsStore.getRooms();
});
</script>

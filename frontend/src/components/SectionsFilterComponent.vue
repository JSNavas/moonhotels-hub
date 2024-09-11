<script setup lang="ts">
import { format } from "date-fns";
import { onMounted, reactive, ref } from "vue";
import { useRoomsStore } from "../stores/rooms";
import { RequestRoom, Providers } from "../types";

const roomsStore = useRoomsStore();

const providers = ref<Providers[]>([]);

const formData: RequestRoom = reactive({
  hotelId: 1 as number,
  numberOfGuests: "1",
  checkIn: null,
  checkOut: null,
  numberOfRooms: "1",
  currency: "EUR",
});

const resetForm = () => {
  formData.hotelId = 1;
  formData.numberOfGuests = "1";
  formData.checkIn = null;
  formData.checkOut = null;
  formData.numberOfRooms = "1";
  formData.currency = "EUR";
};

const handleSubmit = () => {
  if (formData.checkIn && formData.checkOut) {
    format(formData.checkIn, "yyyy-MM-dd");
    format(formData.checkOut, "yyyy-MM-dd");
  }
  roomsStore.filterRooms(formData);
  console.log(formData);
};

onMounted(async () => {
  await roomsStore.getProviders();
  providers.value = roomsStore.providers;
});
</script>

<template>
  <section class="bg-white p-6 rounded-md shadow-md mb-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div>
        <label
          for="rooomsNumber"
          class="block text-sm font-medium text-gray-700"
          >Cantidad de Habitaciones</label
        >
        <div class="relative mt-1">
          <select
            id="roomsNumber"
            class="block appearance-none w-full bg-white border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            v-model="formData.hotelId"
          >
            <option
              v-for="provider in providers"
              :key="provider.hotelId"
              :value="provider.hotelId"
            >
              {{ provider.name }}
            </option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path d="M7 10l5 5 5-5H7z" />
            </svg>
          </div>
        </div>
      </div>

      <div>
        <label
          for="rooomsNumber"
          class="block text-sm font-medium text-gray-700"
          >Cantidad de Habitaciones</label
        >
        <div class="relative mt-1">
          <select
            id="roomsNumber"
            class="block appearance-none w-full bg-white border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            v-model="formData.numberOfRooms"
          >
            <option value="1">1 habitación</option>
            <option value="2">2 habitaciones</option>
            <option value="3">3 habitaciones</option>
            <option value="4">4 habitaciones</option>
            <option value="5">5 habitaciones</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path d="M7 10l5 5 5-5H7z" />
            </svg>
          </div>
        </div>
      </div>

      <div>
        <label for="checkin" class="block text-sm font-medium text-gray-700"
          >Fecha de Entrada</label
        >
        <input
          type="date"
          id="checkin"
          v-model="formData.checkIn"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
        />
      </div>

      <div>
        <label for="checkout" class="block text-sm font-medium text-gray-700"
          >Fecha de Salida</label
        >
        <input
          type="date"
          id="checkout"
          v-model="formData.checkOut"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
        />
      </div>

      <div>
        <label for="guests" class="block text-sm font-medium text-gray-700"
          >Cantidad de Personas</label
        >
        <div class="relative mt-1">
          <select
            id="guests"
            v-model="formData.numberOfGuests"
            class="block appearance-none w-full bg-white border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="1">1 persona</option>
            <option value="2">2 personas</option>
            <option value="3">3 personas</option>
            <option value="4">4 personas</option>
            <option value="5">5 personas</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path d="M7 10l5 5 5-5H7z" />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-4 text-right space-x-4">
      <button
        class="bg-red-400 text-white px-6 py-2 rounded-md shadow-sm hover:bg-red-600 transition"
        @click="resetForm"
      >
        Limpiar
      </button>
      <button
        class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-sm hover:bg-blue-600 transition"
        @click="handleSubmit"
      >
        Buscar
      </button>
    </div>
  </section>
</template>

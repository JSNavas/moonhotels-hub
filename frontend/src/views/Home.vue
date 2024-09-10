<template>
  <div class="container mx-auto px-6 py-10 flex space-x-6">
    <!-- Filters Section -->

    <aside class="w-1/4 bg-white p-4 rounded-md shadow-md">
      <h2 class="text-xl font-semibold mb-4">Filters</h2>

      <!-- Price Filter -->
      <div class="mb-6">
        <h3 class="text-lg font-medium">Price Range</h3>
        <input type="range" min="50" max="500" class="w-full mt-2" />
        <div class="flex justify-between text-sm">
          <span>$50</span>
          <span>$500</span>
        </div>
      </div>

      <!-- Rating Filter -->
      <div class="mb-6">
        <h3 class="text-lg font-medium">Rating</h3>
        <div class="space-y-2">
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">5 stars</span>
          </label>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">4 stars</span>
          </label>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">3 stars</span>
          </label>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">2 stars</span>
          </label>
        </div>
      </div>

      <!-- Amenities Filter -->
      <div class="mb-6">
        <h3 class="text-lg font-medium">Amenities</h3>
        <div class="space-y-2">
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">Free WiFi</span>
          </label>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">Pool</span>
          </label>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">Parking</span>
          </label>
          <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" />
            <span class="ml-2">Pet Friendly</span>
          </label>
        </div>
      </div>
    </aside>

    <!-- Main Content Section -->
    <main class="w-3/4">
      <section class="bg-white p-6 rounded-md shadow-md mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
          <!-- Destination -->
          <div>
            <label
              for="destination"
              class="block text-sm font-medium text-gray-700"
              >Destino</label
            >
            <input
              type="text"
              id="destination"
              placeholder="Ingresa tu destino"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Check-in Date -->
          <div>
            <label for="checkin" class="block text-sm font-medium text-gray-700"
              >Fecha de Entrada</label
            >
            <input
              type="date"
              id="checkin"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Check-out Date -->
          <div>
            <label
              for="checkout"
              class="block text-sm font-medium text-gray-700"
              >Fecha de Salida</label
            >
            <input
              type="date"
              id="checkout"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Number of Guests -->
          <div>
            <label for="guests" class="block text-sm font-medium text-gray-700"
              >Cantidad de Personas</label
            >
            <div class="relative mt-1">
              <select
                id="guests"
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

        <!-- Search Button -->
        <div class="mt-4 text-right">
          <button
            class="bg-blue-500 text-white px-6 py-3 rounded-md shadow-sm hover:bg-blue-600 transition"
          >
            Buscar
          </button>
        </div>
      </section>
      <h2 class="text-2xl font-semibold mb-4">Available Rooms</h2>

      <!-- Room Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Room 1 -->
        <div class="bg-white p-4 rounded-md shadow-md">
          <img
            src="https://via.placeholder.com/400x250"
            alt="Room Image"
            class="w-full h-48 object-cover rounded-md"
          />
          <div class="mt-4">
            <h3 class="text-xl font-semibold">Luxury Suite</h3>
            <p class="text-gray-600">Price: $250 / night</p>
            <p class="text-yellow-500">★★★★★</p>
            <p class="text-gray-600 mt-2">
              Located in downtown, with free WiFi, a pool, and more amenities.
            </p>
            <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-md">
              View Details
            </button>
          </div>
        </div>

        <!-- Room 2 -->
        <div class="bg-white p-4 rounded-md shadow-md">
          <img
            src="https://via.placeholder.com/400x250"
            alt="Room Image"
            class="w-full h-48 object-cover rounded-md"
          />
          <div class="mt-4">
            <h3 class="text-xl font-semibold">Standard Room</h3>
            <p class="text-gray-600">Price: $120 / night</p>
            <p class="text-yellow-500">★★★★☆</p>
            <p class="text-gray-600 mt-2">
              Comfortable and affordable, perfect for short stays.
            </p>
            <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-md">
              View Details
            </button>
          </div>
        </div>

        <!-- More rooms here -->
      </div>
    </main>
  </div>
</template>

<script setup lang="ts">
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

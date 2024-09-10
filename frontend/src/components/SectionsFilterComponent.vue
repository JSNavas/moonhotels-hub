<template>
  <section class="bg-white p-6 rounded-md shadow-md mb-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <!-- Destination -->
      <div>
        <label for="destination" class="block text-sm font-medium text-gray-700"
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
        <label for="checkout" class="block text-sm font-medium text-gray-700"
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
        class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-sm hover:bg-blue-600 transition"
      >
        Buscar
      </button>
    </div>
  </section>
</template>

<template>
  <aside class="w-1/4 bg-white p-4 rounded-md shadow-md">
    <h2 class="text-xl font-semibold mb-4">Filters</h2>

    <!-- Price Filter -->
    <div class="mb-6">
      <h3 class="text-lg font-medium">Price Range</h3>
      <input type="range" min="50" max="500" class="w-full mt-2 bg-sky-700" />
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
</template>

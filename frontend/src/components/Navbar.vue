<script setup>
  import { ref } from 'vue'
  let showNav = ref(false)
  function toggleNav() {
    showNav.value = !showNav.value
  }
</script>

<template>
  <nav class="hidden sm:flex flex-col sm:flex-row justify-between items-center p-4 bg-gray-100 text-left">
    <div class="p-2 ml-8 flex flex-between font-bold text-4xl">
      Logo
    </div>

    <ul class="grid grid-cols-3 gap-4 p-2 mr-8">
      <li>Link 1</li>
      <li>Link 2</li>
      <li>Link 3</li>
    </ul>
  </nav>

  <nav id="mobile-nav" class="visible sm:hidden flex flex-col bg-gray-100">
    <div class="flex flex-row justify-between p-4">
      <div class="p-2 ml-4 flex flex-between font-bold text-4xl">
        Logo
      </div>
      
      <button @click="toggleNav" class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" v-if="!showNav">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" v-else>
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    
    <ul class="grid grid-rows-auto gap-4 p-2 bg-gray-200" :class="{'hidden': !showNav}">
      <li>Link 1</li>
      <li>Link 2</li>
      <li>Link 3</li>
    </ul>
  </nav>
</template>
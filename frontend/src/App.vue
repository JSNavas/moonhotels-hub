<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://v3.vuejs.org/api/sfc-script-setup.html#sfc-script-setup
import Default from './layout/Default.vue'
</script>

<template>

  <default>
    <template #page>
      <router-view />
    </template>
  </default>

</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

#app > main{
  flex-grow: 1;
}
</style>

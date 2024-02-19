<script setup>
import { RouterLink, RouterView } from 'vue-router'
import TaskView from './views/TaskView.vue';
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Task</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>


@media (min-width: 1024px) {
  
}
</style>

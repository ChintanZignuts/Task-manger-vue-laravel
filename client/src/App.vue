<script setup>
import { RouterView } from 'vue-router'
import TaskView from './views/TaskView.vue';
</script>

<template>
  <div class="main-containor">
    <header>
      <div class="wrapper">
        <nav>
          <router-link to="/">Task</router-link>
          <router-link to="/about">About</router-link>
        </nav>
      </div>
    </header>
    <RouterView />
  </div>
</template>

<style scoped>
.main-containor{
  text-align: center;
  min-width: 100vh;
}

@media (min-width: 1024px) {
  
}
</style>

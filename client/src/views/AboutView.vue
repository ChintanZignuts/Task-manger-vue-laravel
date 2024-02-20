<script setup></script>
<template>
  <div class="contaionor">
    <div class="about">
      <h2>About Page</h2>
    <p>This is the about page content.</p>
    </div>
  </div>
</template>

<style scoped>
.containor{
  text-align: center;
}
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>

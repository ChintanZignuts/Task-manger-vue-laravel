
<script setup>
const props = defineProps({
    task:Object
})
</script>

<template>
    <div>
        <h1>{{ task.name }}</h1>
        <p>{{ task.description }}</p>
        <p>{{ task.due_date }}</p>
    </div>
</template>

<style>
.containor{
    min-width: 100%;
}
</style>
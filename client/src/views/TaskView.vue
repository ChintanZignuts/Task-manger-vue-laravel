<script setup>
import { onMounted, ref, provide } from "vue";
import TaskForm from "@/components/Task/TaskForm.vue";
import axios from "axios";
import TaskList from "../components/Task/Taskbox.vue";
const tasks = ref([]);
const show = ref(false);
const fetchTasks = async () => {
  try {
    const response = await axios.get("http://127.0.0.1:8000/api/tasks");
    tasks.value = response.data.tasks;
  } catch (error) {
    console.error("Failed to fetch tasks:", error);
  }
};
const addNewTask = async (task) => {
  try {
    const response = await axios.post("http://127.0.0.1:8000/api/tasks", task);
    fetchTasks();
    return response;
  } catch (error) {
    console.error("Failed to add new task:", error);
  }
};
provide("addNewTask", addNewTask);
const hendleremove = () => {
  show.value = false;
};
const createTask = {
  header: "Create Task",
};
onMounted(fetchTasks);
</script>

<template>
  <div class="">
    <h1>This is task view</h1>
    <button @click="show = true">Create Task</button>
    <TaskForm v-bind="createTask" @remove="hendleremove" :show="show" />
    <TaskList v-for="task in tasks" :task="task" :key="task.id" />
  </div>
</template>

<style>
.containor {
  text-align: center;
  min-width: 100vw;
}
</style>

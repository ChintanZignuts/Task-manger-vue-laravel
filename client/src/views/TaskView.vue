<script setup>
import { onMounted, ref } from "vue";
import TaskForm from "@/components/Task/TaskForm.vue";
import axios from 'axios';
import TaskList from "../components/Task/Taskbox.vue";
const tasks= ref([]);
const show=ref(false);
const getTask=async()=>{
  try{
    const responese=await axios.get("http://127.0.0.1:8000/api/tasks");
    tasks.value=responese.data.tasks;
  }catch(error){
    console.log("error",error);
  }
}
const hendleremove=()=>{
  console.log("remove");
  show.value=false;
}
const createTask={
  header:"Create Task"
}
onMounted(getTask);
</script>

<template>
  <div class="">
    <h1>This is task view</h1>
    <button @click="show=true">Create Task</button>
      <TaskForm v-bind="createTask" @remove="hendleremove" :show="show"/>
    <TaskList v-for="task in tasks" :task="task" :key="task.id"/>   
  </div>
</template>

<style>
.containor{
  text-align: center;
  min-width: 100vw;
}
</style>
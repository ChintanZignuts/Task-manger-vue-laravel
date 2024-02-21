<script setup>
import { onMounted, ref, provide } from "vue";
import TaskForm from "@/components/Task/TaskForm.vue";
import axios from "axios";
import Taskbox from "../components/Task/Taskbox.vue";
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
const deleteTask=async (id)=>{
  try {
    const response=await axios.delete(`http://127.0.0.1:8000/api/tasks/${id}`);
    fetchTasks();
    return response;
  } catch (error) {
    console.log("Failed to delete task",error);
  }
}
provide("addNewTask", addNewTask);
provide("deleteTask", deleteTask);
const hendleremove = () => {
  show.value = false;
  
};
const createTask = {
  header: "Create Task",
};
const colors=["#fee4cb","#e9e7fd","#dbf6fd","#ffd3e2","#c8f7dc","#d5deff"]
const perentstyle={
  backgroundColor: 'lightblue'
}
const getcolor=(index)=>{
  return colors[index % colors.length];
}
const getCurrentDate = () => {
  const currentDate = new Date();
  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  const month = monthNames[currentDate.getMonth()];
  const day = currentDate.getDate();

  return `${month}, ${day}`;
};
onMounted(fetchTasks);
</script>

<template>
  <div class="task-content">
    <div class="task-section">
        <div class="task-section-header">
          <p>Task</p>
          <p class="time">{{ getCurrentDate() }}</p>
        </div>
        <div class="task-section-line">
          <div class="task-status">
            <div class="item-status">
              <span class="status-number">{{ tasks.length }}</span>
              <span class="status-type">Total Task</span>
            </div>
          </div>
          <div class="view-actions" >
            <button @click="show = true" class="view-btn list-view" title="Add Task"><svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" /></svg></button>
          </div>
        </div>
      <TaskForm v-bind="createTask" @remove="hendleremove" :show="show" />
      <div class="task-boxes jsGridView">
        <Taskbox v-for="(task,index) in tasks" :task="task" :key="task.id" :customstyle="{ backgroundColor: getcolor(index) }"/>
      </div>
    </div>
  </div>
</template>

<style scoped>
.task-content{
    display: flex;
    height: 100%;
    overflow: hidden;
    padding: 16px 24px 24px 0;
}
.task-section{
  flex: 2;
  background-color: #fff;
  border-radius: 32px;
  padding: 32px 32px 0 32px;
  height: 100%;
  display: flex;
  overflow: hidden;
  flex-direction: column;
}
.task-section-header{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
  color:  #1f1c2e;
}
.task-section-header p{
  font-size: 24px;
  line-height: 32px;
  font-weight: 700;
  opacity: .9;
  margin: 0;
  color: #1f1c2e;
}
.task-section-header .time{
  font-size: 20px;
}
.task-section-line{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 32px;
}
.task-status {
  display: flex;
}
.item-status:not(:last-child) .status-type:after {
    content: '';
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translatey(-50%);
    width: 6px;
    height: 6px;
    border-radius: 50%;
    border: 1px solid  #4A4A4A;
  }
.status-number {
  font-size: 24px;
  line-height: 32px;
  font-weight: 700;
  color: #1f1c2e;
}

.status-type {
  position: relative;
  padding-right: 24px;
  color: var(--secondary-color);
}
.item-status {
  display: flex;
  flex-direction: column;
  margin-right: 16px;
}
.view-actions {
  display: flex;
  align-items: center;
}
.view-btn {
  width: 36px;
  height: 36px;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px;
  border-radius: 4px;
  background-color: #1f1c2e;
  border: none;
  color: #fff;
  margin-left: 8px;
  transition: .2s;
}
.task-boxes{
  margin: 0 -8px;
  overflow-y:auto;
}
.task-boxes.jsGridView {
    display: flex;
    flex-wrap: wrap;
}
@media screen and (max-width: 980px) {}
</style>

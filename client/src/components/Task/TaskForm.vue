<template>
  <div v-if="props.show" class="form">
    <div class="close-btn"><button @click="$emit('remove')" class="btn">X</button></div>
    <div class="div-wraper">
      <div class="container-box">
        <h1>{{ header }}</h1>
        <form class="form-div" @submit.prevent="handleSubmit">
          <label for="name">Task Name</label>
          <input type="text" id="name" v-model="formData.name" required>
          <label for="description">Description</label>
          <textarea id="description" cols="30" rows="10" v-model="formData.description"></textarea>
          <label for="due_date">Due_date</label>
          <input type="date" id="due_date" v-model="formData.due_date">
          <button type="submit">Save Task</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
const props=defineProps({
  show:Boolean,
  header:String
})

const formData = ref({
  name: '',
  description: '',
  completed: false,
  due_date: '',
});
const handleSubmit=async(formData)=>{
  try {
   console.log(formData);
    const response=await axios.post("http://127.0.0.1:8000/api/tasks",formData);
    const createdtask=response.data;
    if(createdtask){
      console.log("success task created",createdtask.id);
    }
 } catch (error) {
  console.error('Error creating task',error);
 }
}
</script>

<style scoped>
.form{
background: rgba(0, 0, 0, 0.421);
position: fixed;
color: black;
top: 0px;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
position: fixed;
min-width: 100vw;
height: 100vh;
}
.btn{
  background: transparent;
  color: white;
  border: 0px;
  font-size: 2rem;
}
.div-wraper{
  background: white;
  padding: 50px;
  border-radius: 15px;
}
.close-btn{
  position: absolute;
  top: 15px;
  right: 25px;
}
input,textarea{
  border-radius: 10px;
}
.form-div{
  display: flex;
  flex-direction: column;
  min-width: 60%;
}

input{
  padding: 10px;
  margin: 10px;
  font-size: 1rem;
}
</style>
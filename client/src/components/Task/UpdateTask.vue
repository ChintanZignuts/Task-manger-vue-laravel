
<script setup>

</script>

<template>
    <div v-if="props.show" class="form">
      <div class="close-btn">
        <button @click="hendleremove()" class="btn">X</button>
      </div>
      <div class="div-wraper">
        <div class="container-box">
          <h1>{{ header }}</h1>
          <form class="form-div" @submit.prevent="handleSubmit">
            <label for="name">Task Name</label>
            <input type="text" id="name" v-model="formData.name" required />
            <label for="description">Description</label>
            <textarea
              id="description"
              cols="30"
              rows="10"
              v-model="formData.description"
            ></textarea>
            <label for="due_date">Due_date</label>
            <input type="date" id="due_date" v-model="formData.due_date" />
            <button type="submit" class="save-btn">Save Task</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <style scoped>
  .form {
    background: rgba(0, 0, 0, 0.421);
    color: black;
    top: 0px;
    left: 0px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: fixed;
    min-width: 100vw;
    height: 100vh;
    z-index: 100;
  }
  .btn {
    background: transparent;
    color: white;
    border: 0px;
    font-size: 2rem;
  }
  .save-btn{
    margin: 10px;
    border: none;
    background-color: black;
    color: white;
    padding: 15px;
    border-radius: 15px;
    font-size: 1.2rem;
  }
  .div-wraper {
    background: white;
    padding: 50px;
    border-radius: 15px;
  }
  .close-btn {
    position: absolute;
    top: 15px;
    right: 25px;
  }
  input,
  textarea {
    font-family: 'DM Sans', sans-serif;
    border-radius: 10px;
    padding: 10px;
    margin: 10px;
    font-size: 1.2rem;
  }
  .form-div {
    display: flex;
    flex-direction: column;
    min-width: 60%;
  }
  
  
  </style>
  
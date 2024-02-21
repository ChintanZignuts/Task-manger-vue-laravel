
<script setup>
import { inject } from 'vue';
const props = defineProps({
    task:Object,
    customstyle:Object
})
const deleteTask=inject("deleteTask");

const hendleDelete=async (id)=>{
    try {
        const response=await deleteTask(id);
        console.log(response.data);
    } catch (error) {
        console.log(error);
    } 
}
const formatDate = (dateString) => {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(dateString).toLocaleDateString(undefined, options);
};
</script>

<template>
    <div class="task-box-wrapper" >
        <div class="task-box" :style="customstyle">
            <div class="task-box-header" >
              <span>{{ formatDate(task.updated_at) }}</span>
              <div class="more-wrapper">
                    <button class="task-btn-edit" >
                        <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </button>
                    <button class="task-btn-delete" @click="hendleDelete(task.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                            <path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"></path>
                            </svg>
                    </button>
                </div>
            </div>

            <h1>{{ task.name }}</h1>
            <p>{{ task.description }}</p>
            <p>{{ task.due_date }}</p>
        </div>
    </div>
</template>

<style>
.task-box-wrapper{
    min-width: 33.3%;
    padding: 8px;
    transition: 0.2s;
}
.task-box{
    border-radius: 30px;
    padding: 16px;
}
.task-box-header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    color: #1f1c2e;
}
.more-wrapper {
    position: relative;
}
.task-btn-delete,.task-btn-edit{
    padding: 0;
    width: 24px;
    height: 24px;
    position: relative;
    background-color: transparent;
    border: none;
}
.task-btn-delete svg,.task-btn-edit svg{
    height: inherit;
    width: 24px;
    z-index: -1;
}
.containor{
    min-width: 100%;
}
@media screen and (max-width: 520px) {
    .task-box-wrapper{
        width: 100%;
    }
}
</style>
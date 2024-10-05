<script setup>
import {onMounted , ref} from "vue";
import { format } from 'date-fns';
import {allTasks, createTask,updateTask,deleteTask,getTask,completeTask} from "../../http/tasks.api.js";
import Tasks from "@/components/Tasks/TasksList.vue";
const tasks = ref([]);
onMounted(async () =>
{
  const {data} = await allTasks();
  //console.log(data);
  tasks.value = data.data;
});

// Function to format date
const formatDate = (date) =>
{
  return format(new Date(date), 'dd/MM/yyyy');
};
// Function to format time
const formatTime = (time) =>
{
  return format(new Date(time), 'HH:mm a');
};

</script>

<template>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h4>Users</h4>
            <p><b>5</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
          <div class="info">
            <h4>Likes</h4>
            <p><b>25</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
          <div class="info">
            <h4>Uploades</h4>
            <p><b>10</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <h4>Stars</h4>
            <p><b>500</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Complete Tasks</h3>
          <ul class="list-group list-group-flush">
            <Tasks v-for="task in tasks" :task="task" :key="task.id" :formatDate="formatDate" :formatTime="formatTime"/>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Uncomplete Tasks</h3>
          <ul>
            <li>Built with Bootstrap 4, SASS and PUG.js</li>
            <li>Fully responsive and modular code</li>
            <li>Seven pages including login, user profile and print friendly invoice page</li>
            <li>Smart integration of forgot password on login page</li>
            <li>Chart.js integration to display responsive charts</li>
            <li>Widgets to effectively display statistics</li>
            <li>Data tables with sort, search and paginate functionality</li>
            <li>Custom form elements like toggle buttons, auto-complete, tags and date-picker</li>
            <li>A inbuilt toast library for providing meaningful response messages to user's actions</li>
          </ul>
        </div>
      </div>
    </div>

  </main>
</template>

<style scoped>
</style>
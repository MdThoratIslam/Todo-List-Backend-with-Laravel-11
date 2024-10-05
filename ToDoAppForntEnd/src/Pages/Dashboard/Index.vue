<script setup>
import {onMounted , ref, computed} from "vue";
import { format } from 'date-fns';
import {allTasks , createTask} from "../../http/tasks.api.js";
import Tasks from "@/components/Tasks/Tasks.vue";
import NewTask from "@/components/Tasks/NewTask.vue";

const tasks = ref([]);

// Function to format date
const formatDate = (date) => {
  return format(new Date(date), 'dd/MM/yyyy');
};

// Function to format time
const formatTime = (time) => {
  return format(new Date(time), 'HH:mm a');
};
onMounted(async () =>
{
  const {data} = await allTasks();
  tasks.value = data.data;
  console.log(data);
});
// Computed properties for filtering completed and uncompleted tasks
const uncompletedTasks = computed(() => tasks.value.filter(task => !task.is_completed));
const completedTasks = computed(() => tasks.value.filter(task => task.is_completed));



const handleAddTask = async (newTask) => {
  const {data} = await createTask(newTask); // Use 'data' here
  tasks.value.unshift(data.data); // Append the new task to the tasks array
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
            <h4>Uploads</h4>
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
<!--      need a input field for add task-->
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title mb-3">Add Task</h3>
          <NewTask @addTask="handleAddTask"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile" :v-if="tasks.length">
          <h3 class="tile-title">Uncompleted Tasks</h3>
          <Tasks :tasks="uncompletedTasks" :formatDate="formatDate" :formatTime="formatTime"/>
          </div>
      </div>
      <div class="col-md-6">
        <div class="tile" :v-if="tasks.length">
          <h3 class="tile-title">Completed Tasks</h3>
          <Tasks :tasks="completedTasks" :formatDate="formatDate" :formatTime="formatTime"/>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>
</style>

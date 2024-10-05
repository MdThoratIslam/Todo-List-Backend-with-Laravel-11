<script setup>
import Tasks from "@/components/Tasks/TasksList.vue";
defineProps({
  tasks: Array,
  formatDate: Function,
  formatTime: Function
})
//if Tas
</script>

<template>
  <ul  class="list-group list-group-flush">
    <Tasks v-for="task in tasks" :task="task" :key="task.id" :formatDate="formatDate" :formatTime="formatTime"/>
  </ul>
</template>

<style scoped>

</style>
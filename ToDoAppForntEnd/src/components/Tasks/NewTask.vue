<script setup>
import {reactive} from "vue";
const newTask = reactive({
  name: '',
  is_completed: false
});
const emit = defineEmits(['addTask']);

const addNewTask = event => {
  if(event.target.value.trim() ){
    newTask.name = event.target.value;
    event.target.value = '';
    emit('addTask', newTask);
  }
};
</script>

<template>
  <div class="form-group">
    <input
        class="form-control"
        type="text"
        placeholder="Enter task name"
        @keydown.enter="addNewTask"
    />
  </div>
</template>

<style scoped>

</style>
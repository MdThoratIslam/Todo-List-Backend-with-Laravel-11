<script setup>
import {computed, ref} from "vue";
import TaskAction from "@/components/Tasks/TaskAction.vue";
const props= defineProps({
  task: Object,
  formatDate: Function,
  formatTime: Function
});
const isEditable = ref(false);
const vFocus = {mounted:(el) => el.focus()};
const completedClass = computed(()=>props.task.is_completed == 1 ? 'completed text-primary' : ' text-danger');
</script>

<template>
  <li class="list-group-item py-3" >
    <div class="d-flex justify-content-start align-items-center" :class="completedClass">
      <input class="form-check-input mt-0" :class="completedClass" type="checkbox" :checked="props.task.is_completed"/>
      <div class="ms-2 flex-grow-1 "
           @dblclick="$event => isEditable = true"
           title="Double click the text to edit or remove">
        <div class="relative"  v-if="isEditable">
          <input class="editable-task" type="text" @keyup.esc="$event => isEditable = false" v-focus/>
        </div>
        <span v-else>{{task.name}}</span>
      </div>
      <div class="task-date">
        {{ formatDate(task.created_at) }}
        <p>{{formatTime(task.created_at) }}</p>
      </div>
    </div>
    <TaskAction @editTask="$event => isEditable = true" v-show="!isEditable"/>
  </li>

</template>

<style scoped>

.editable-task {
  width: 100%;
  background-color: transparent;
  border: 0;
  /* outline: 0; */
  padding: 0;
  margin: 0;
}

.editable-task:focus {
  outline: none !important;
}

.edit-item input[type="text"] {
  color: #999;
}

</style>
<script setup>
import IconPencilFill from "@/components/Icons/iconPencilFill.vue";
import IconsTrashFill from "@/components/Icons/iconsTrashFill.vue";
import {computed} from "vue";
const props= defineProps({
  task: Object,
  formatDate: Function,
  formatTime: Function
});
const completedClass = computed(()=>props.task.is_completed ? "completed" :"")
</script>

<template>
  <li class="list-group-item py-3" >
    <div class="d-flex justify-content-start align-items-center">
      <input class="form-check-input mt-0" :class="completedClass" type="checkbox" :checked="props.task.is_completed"/>
      <div class="ms-2 flex-grow-1 " :class="completedClass" title="Double click the text to edit or remove">
        <span>{{task.name}}</span>
      </div>
      <!--                task.created_at date formate use -->
      <div class="task-date">
        {{ formatDate(task.created_at) }}
        <p>{{formatTime(task.created_at) }}</p>
      </div>
    </div>
    <div class="task-actions">
      <button class="btn btn-sm btn-circle btn-outline-secondary me-1">
        <icon-pencil-fill />
      </button>
      <button class="btn btn-sm btn-circle btn-outline-danger">
        <icons-trash-fill />
      </button>
    </div>
  </li>

</template>

<style scoped>
.form-check-input.completed {
  filter: none;
  opacity: 0.5;
}

.completed {
  color: #9ca3af;
  text-decoration: line-through;
}

.task-date {
  color: #6b7280;
  font-size: 11px;
  padding: 0 2px;
}
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

.list-group-item:hover .task-actions {
  visibility: visible;
  opacity: 1;
}

.task-actions {
  position: absolute;
  top: 50%;
  right: 120px;
  transform: translateY(-50%);
  visibility: hidden;
  opacity: 0;
  transition: visibility 0.2s, opacity 0.3s linear;
}

.btn-circle {
  width: 30px;
  height: 30px;
  padding: 6px 0px;
  border-radius: 15px;
  text-align: center;
  font-size: 10px;
  line-height: 1.42857;
}
</style>
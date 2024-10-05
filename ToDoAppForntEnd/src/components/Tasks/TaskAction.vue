<script setup>
import IconsTrashFill from "@/components/Icons/iconsTrashFill.vue";
import IconPencilFill from "@/components/Icons/iconPencilFill.vue";

const emit = defineEmits(['deleteTask', 'editTask']);
</script>

<template>
  <div class="task-actions">
    <button class="btn btn-sm btn-circle btn-outline-secondary me-1" @click="$event => emit('editTask')">
      <icon-pencil-fill />
    </button>
    <button class="btn btn-sm btn-circle btn-outline-danger" @click="$event => emit('deleteTask')">
      <icons-trash-fill />
    </button>
  </div>
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
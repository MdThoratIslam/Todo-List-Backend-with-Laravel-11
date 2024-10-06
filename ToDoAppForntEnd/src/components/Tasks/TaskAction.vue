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
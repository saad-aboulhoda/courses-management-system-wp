<script setup>

const props = defineProps(['isLoading']);
</script>

<template>
  <div v-if="isLoading" class="themosis__metabox__status">
   <span
       class="themosis__metabox__status__icon">
      <svg class="themosis__svg icon__saving"
           width="22" height="16" viewBox="0 0 22 16"
           fill="none"
           xmlns="http://www.w3.org/2000/svg">
         <path
             d="M11.2154 0C15.4271 0 18.8872 3.10714 19.4718 7.14286H21.9535L17.7776 11.9048L13.6016 7.14286H16.3697C15.8328 4.79762 13.7329 3.03571 11.2154 3.03571C9.48534 3.03571 7.95814 3.88095 6.99171 5.15476L4.95147 2.83333C6.47866 1.09524 8.72174 0 11.2154 0ZM10.7381 16C6.53832 16 3.06633 12.8929 2.4817 8.85714H0L4.17594 4.09524C5.57189 5.67857 6.95591 7.27381 8.35187 8.85714H5.58382C6.12073 11.2024 8.22063 12.9643 10.7381 12.9643C12.4681 12.9643 13.9953 12.119 14.9618 10.8452L17.002 13.1667C15.4748 14.9048 13.2437 16 10.7381 16Z"
             fill="#0085BA"></path>
      </svg>
   </span>
    <p class="themosis__metabox__status__text">
      <slot></slot>
    </p>
  </div>
</template>

<style scoped>

</style>
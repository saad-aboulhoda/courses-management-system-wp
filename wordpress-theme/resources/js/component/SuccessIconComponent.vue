<script setup>
const props = defineProps(['isSuccessful']);
</script>

<template>
  <div v-if="isSuccessful" class="themosis__metabox__status">
   <span
       class="themosis__metabox__status__icon">
      <svg class="themosis__svg icon__done" width="22"
           height="16" viewBox="0 0 22 16" fill="none"
           xmlns="http://www.w3.org/2000/svg">
         <path
             d="M19.1221 0L21.9535 1.61373L9.67728 16H6.84594L0 8.20601L2.83134 6.06009L8.26161 10.1803L19.1221 0Z"
             fill="#46B450"></path>
      </svg>
   </span>
    <p class="themosis__metabox__status__text">
      <slot></slot>
    </p>
  </div>
</template>

<style scoped>

</style>
<script setup>
import LoadingIconComponent from "./LoadingIconComponent.vue";
import SuccessIconComponent from "./SuccessIconComponent.vue";

const props = defineProps(['lesson', 'index']);
const emit = defineEmits(['toggleLesson', 'deleteLesson', 'execSave']);

function extractDriveId(input) {
  const match = input.match(/\/d\/([a-zA-Z0-9_-]+)/);

  // If there's a match, return the ID; otherwise, assume input is already an ID
  return match ? match[1] : input;
}
</script>

<template>
  <div
      class="lesson bg-[#F0F2F5] hover:bg-[#d8dadf] duration-300 p-2 cursor-pointer flex justify-between items-center"
      @click="$emit('toggleLesson', index)">
    <h3 class="text-[#65676b]">{{ String(lesson.lesson_number).padStart(3, '0') }} - {{
        lesson.title || 'New Lesson'
      }}</h3>
    <i class="fa fa-trash text-[#d02323]" @click.stop="$emit('deleteLesson', index)"></i>
  </div>
  <div v-show="lesson.expanded" class="bg-white">
    <div class="p-[8px]">
      <input v-model="lesson.title" placeholder="Lesson Name"
             class="block w-full min-h-[30px] px-[8px] border-[1px] border-solid border-[#8c8f94] rounded-[4px] mb-3"/>
      <textarea v-model="lesson.description" rows="5" placeholder="Lesson Description"
                class="resize-none block w-full min-h-[30px] px-[8px] border-[1px] border-solid border-[#8c8f94] rounded-[4px] mb-3"></textarea>
      <input :value="lesson.google_video_id" @input="event => {
        lesson.google_video_id = extractDriveId(event.target.value)
      }" placeholder="Lesson URL"
             class="block w-full min-h-[30px] px-[8px] border-[1px] border-solid border-[#8c8f94] rounded-[4px]"/>
    </div>
    <div class="p-[8px] bg-[#F0F2F5] flex items-center">
      <button type="button" :disabled="lesson.loading" @click="$emit('execSave', index)"
              class="button button-primary">
        Save
      </button>
      <loading-icon-component :is-loading="lesson.loading">Saving</loading-icon-component>
      <success-icon-component :is-successful="lesson.success">Saved</success-icon-component>
    </div>
  </div>
</template>

<style scoped>

</style>
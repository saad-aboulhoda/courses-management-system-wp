<script setup>
import {ref, onMounted, computed} from 'vue';
import axios from "axios";
import LessonItemComponent from "./LessonItemComponent.vue";
import {Sortable} from "sortablejs-vue3";
import SuccessIconComponent from "./SuccessIconComponent.vue";
import LoadingIconComponent from "./LoadingIconComponent.vue";
import config from "../config";

const lessons = ref([]);
const search = ref('');
const currentPage = ref(1);
const itemsPerPage = ref(10);
const courseID = ref(null);
const token = ref(null);
const isAdding = ref(false);
const isAdded = ref(false);
const isDeleting = ref(false);
const isDeleted = ref(false);
const isUpdating = ref(false);

const axiosInstance = axios.create({
  baseURL: `${config.api.baseUrl}/lessons`,
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
  },
})

onMounted(() => {
  document.querySelector('#lessons div.inside').style.padding = '8px 16px';
  document.querySelector('#lessons div.inside').style.position = 'relative';
  document.querySelector('#lessons div.inside').style.marginTop = '0px';
  token.value = document.querySelector('input[name="_token"]').value;
  courseID.value = document.querySelector('input[name="_post_id"]').value;
  fetchLessons();
})

const fetchLessons = async () => {
  try {
    const response = await axiosInstance.get(`/course/${courseID.value}`);
    lessons.value = response.data.map(lesson => ({
      ...lesson,
      expanded: false,
      loading: false,
      success: null
    }));
  } catch (error) {
    console.error('Error fetching lessons:', error);
  }
};

const filterLessons = () => {
  currentPage.value = 1;
};

const paginatedLessons = computed(() => {
  const filteredLessons = lessons.value.filter(lesson =>
      lesson.title.toLowerCase().includes(search.value.toLowerCase()) ||
      lesson.description.toLowerCase().includes(search.value.toLowerCase())
  );

  const start = (currentPage.value - 1) * itemsPerPage.value;
  const end = start + itemsPerPage.value;
  const result = filteredLessons.slice(start, end);
  result.sort((a, b) => a.lesson_number - b.lesson_number);
  return result;
});

const totalPages = computed(() => {
  return Math.ceil(lessons.value.filter(lesson =>
      lesson.title.toLowerCase().includes(search.value.toLowerCase()) ||
      lesson.description.toLowerCase().includes(search.value.toLowerCase())
  ).length / itemsPerPage.value);
});

const addLesson = async () => {
  const lesson = {
    title: '',
    description: '',
    google_video_id: '',
    course_id: courseID.value
  };
  try {
    isAdded.value = false;
    isAdding.value = true;
    const response = await saveLesson(lesson);
    lessons.value.push({
      ...response.data,
      expanded: false,
      loading: false,
      success: null
    });
    isAdding.value = false;
    isAdded.value = true;
    setTimeout(() => {
      isAdded.value = false;
    }, 3000);
  } catch (error) {
    isAdding.value = false;
    console.error('Error adding lesson:', error);
  }
};

const toggleLesson = (index) => {
  paginatedLessons.value[index].expanded = !paginatedLessons.value[index].expanded;
};

const isNewLesson = (lesson) => !lesson.id;

const execSave = async (index) => {
  const lesson = paginatedLessons.value[index];
  lesson.loading = true;
  lesson.success = null;
  try {
    let res;
    if (isNewLesson(lesson)) {
      res = await saveLesson(lesson);
    } else {
      res = await updateLesson(lesson);
    }
    Object.assign(lesson, res.data);
    lesson.loading = false;
    lesson.success = true;
    setTimeout(() => {
      lesson.success = null;
    }, 3000);
  } catch (error) {
    lesson.loading = false;
    console.error('Error saving lesson:', error);
  }
};

const saveLesson = (lesson) => {
  return axiosInstance.post('', lesson, {
    headers: {
      'X-CSRF-TOKEN': token.value
    }
  });
}

const updateLesson = (lesson) => {
  return axiosInstance.put(`/${lesson.id}`, lesson, {
    headers: {
      'X-CSRF-TOKEN': token.value
    }
  });
}

const deleteLesson = async (index) => {
  const lesson = paginatedLessons.value[index];
  try {
    if (isDeleting.value === false) {
      isDeleted.value = false;
      isDeleting.value = true;
      await axiosInstance.delete(`/${lesson.id}`, {
        headers: {
          'X-CSRF-TOKEN': token.value
        }
      });
      await fetchLessons();
      isDeleting.value = false;
      isDeleted.value = true;
      setTimeout(() => {
        isDeleted.value = false;
      }, 3000);
    }
  } catch (error) {
    isDeleting.value = false;
    console.error('Error deleting lesson:', error);
  }
}

const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--;
  }
};

const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    currentPage.value++;
  }
};

const changeOrder = async (event) => {
  if (event.oldIndex === event.newIndex) return;
  isUpdating.value = true
  const start = (currentPage.value - 1) * itemsPerPage.value;
  const oldIndex = event.oldIndex + start
  const newIndex = event.newIndex + start;
  // Ordering lessons
  // Remove lesson from the array
  const removedLesson = lessons.value.splice(oldIndex, 1)[0];
  // Insert lesson at the new index
  lessons.value.splice(newIndex, 0, removedLesson);
  // Update lessons order that are between old and new index
  try {
    const promises = [];
    if (oldIndex < newIndex) {
      for (let i = oldIndex; i <= newIndex; i++) {
        lessons.value[i].lesson_number = i + 1;
        promises.push(updateLesson(lessons.value[i]))
      }
    } else {
      for (let i = newIndex; i <= oldIndex; i++) {
        lessons.value[i].lesson_number = i + 1;
        promises.push(updateLesson(lessons.value[i]))
      }
    }
    await Promise.all(promises);
  } catch (error) {
    await fetchLessons();
    console.error('Error updating lesson order:', error);
  } finally {
    isUpdating.value = false;
  }
};

const handleItemsPerPageKeyUp = (event) => {
  if (event.target.value === '' || event.target.value < 1) {
    itemsPerPage.value = 1;
  }
}

const handleItemsPerPageChange = (event) => {
  itemsPerPage.value = parseInt(event.target.value, 10);
  currentPage.value = 1;
};
</script>

<template>
  <div v-if="isUpdating" class="absolute inset-0 z-10 bg-[#0000001a] flex justify-center items-center">
    <loading-icon-component :is-loading="true"></loading-icon-component>
  </div>
  <input v-model="search" @input="filterLessons" placeholder="Search lessons..."
         class="block w-full mb-4 p-2 border rounded mt-[6px]"/>
  <Sortable
      :list="paginatedLessons"
      item-key="id"
      tag="div"
      class="grid grid-cols-1 gap-2"
      @end="changeOrder"
  >
    <template #item="{element, index}">
      <div class="border rounded">
        <lesson-item-component :lesson="element" :index="index" @exec-save="execSave" @delete-lesson="deleteLesson"
                               @toggle-lesson="toggleLesson"></lesson-item-component>
      </div>
    </template>
  </Sortable>
  <div>
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <button type="button" :disabled="isAdding" @click="addLesson" class="!my-3 button button-primary">Add Lesson
        </button>
        <loading-icon-component :is-loading="isAdding">Adding</loading-icon-component>
        <success-icon-component :is-successful="isAdded">Added</success-icon-component>
        <loading-icon-component :is-loading="isDeleting">Deleting</loading-icon-component>
        <success-icon-component :is-successful="isDeleted">Deleted</success-icon-component>
      </div>
      <div>
        <label for="itemsPerPage" class="mr-2">Items per page:</label>
        <input id="itemsPerPage" type="number" v-model="itemsPerPage" @keyup="handleItemsPerPageKeyUp"
               @change="handleItemsPerPageChange"
               min="1" class="w-20 p-2 border rounded"/>
      </div>
    </div>
  </div>
  <div class="flex justify-between items-center mt-4">
    <button type="button" @click="prevPage" :disabled="currentPage === 1" class="button button-secondary">Previous
    </button>
    <span>Page {{ totalPages === 0 ? 0 : currentPage }} of {{ totalPages }}</span>
    <button type="button" @click="nextPage" :disabled="currentPage === totalPages" class="button button-secondary">
      Next
    </button>
  </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}

.loading-spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-left-color: #4f46e5;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style>

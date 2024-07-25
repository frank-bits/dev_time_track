<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Event from "./Event/Event.vue";
import CreateEventModal from "./Event/CreateEventModal.vue";
import axios from "axios";
import { ref, onMounted } from 'vue'
import EventShow from "./Event/EventShow.vue";

const events = ref([]);

 function getEvents() {
  axios.get('/events/recent')
    .then(response => {
      events.value = response.data
    })
    .catch(error => {
      console.error(error)
    })
  
 }


onMounted(() => {
  getEvents();
})
</script>
<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Dashboard
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
          <div class="absolute m-1 p-1 top-1 right-5 ...">
            <CreateEventModal  />
          </div>
        </div>
      </div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-2 ">
        <div
          class="relative m-2 p-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-2 gap-2"
        >
        <event-show v-for="(event, index) in events" :key="index" :event="event"/>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

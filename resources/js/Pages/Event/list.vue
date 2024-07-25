<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EventShow from "./EventShow.vue";
import { useEventStore } from "@/Store/eventStore";
import CreateEventModal from "./CreateEventModal.vue";
import EventList from "./Components/EventList.vue";
import { ref, onMounted, onBeforeMount, watch } from "vue";
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Events
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
          <div class="absolute m-1 p-1 top-1 right-5 ...">
            <CreateEventModal />
          </div>
        </div>
      </div>
      <EventList />
    </div>
  </AuthenticatedLayout>
</template>

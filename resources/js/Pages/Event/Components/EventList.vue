<script setup lang="ts">
import { ref, onMounted, onBeforeMount, watch } from "vue";
import { useEventStore } from "@/Store/eventStore";
import UpdateEventModal from "../UpdateEventModal.vue";
import { router } from "@inertiajs/vue3";
import DeleteEventModal from "../DeleteEventModal.vue";
const store = useEventStore();

const events = ref();

watch(store.$state, (newVal, oldVal) => {
  console.log(newVal);
  events.value = store.$state.events;
  // const loading = useEventStore().loading;
});

const fetchEvents = async () => {
  await store.fetchEvents();
};

onBeforeMount(() => {
  fetchEvents();
});

router.on("success", (event) => {
  console.log("fetching events");
  fetchEvents();
});
</script>
<template>
  <div v-if="events">
    <div v-for="(event, index) in events" :key="index" class="flex">
      <div class="max-w-7xl flex-auto mx-auto sm:px-6 lg:px-8 mt-4">
        <div
          class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="m-2">
              <!-- <a
            href="#"
            class=" bg-white border border-gray-200 rounded-lg shadow 
            hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 m-2"
            
            > -->
              <div class="w-full m-2">
                <h1 class="m-2">Project: {{ event.project.name }}</h1>
                <h1 class="m-2">Event ID: {{ event.id }}</h1>
                <div
                  id="time-range-container"
                  class="mx-auto grid grid-cols-2 gap-5 m-2 p-2"
                >
                  <div>
                    <label
                      for="start-time"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Start time:</label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none"
                      >
                        <svg
                          class="w-4 h-4 text-gray-500 dark:text-gray-400"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </div>
                      <h3
                        id="start-time"
                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                      >
                        {{ event.start_time }}
                      </h3>
                    </div>
                  </div>
                  <div>
                    <label
                      for="end-time"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >End time:</label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none"
                      >
                        <svg
                          class="w-4 h-4 text-gray-500 dark:text-gray-400"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </div>
                      <h3
                        type="time"
                        id="end-time"
                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                        min="09:00"
                        max="18:00"
                        value="00:00"
                      >
                        {{ event.end_time }}
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="mx-auto grid grid-cols-2 gap-5 m-2 p-2">
                  <UpdateEventModal :event="event" />
                  <DeleteEventModal :block="event" />
                  <!-- <button
                    type="submit"
                    class="w-full text-white bg-orange-600 hover:bg-orange-300 font-bold focus:outline-none rounded-lg text-lg m-1 py-2.5 text-center"
                  >
                    Delete
                  </button> -->
                </div>
              </div>

              <!-- </a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

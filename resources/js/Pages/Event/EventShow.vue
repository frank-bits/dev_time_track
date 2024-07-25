<script setup lang="ts">
import UpdateEventModal from "./UpdateEventModal.vue";

import {onMounted, ref, Ref, toRefs, watch} from "vue";
import { useEventStore } from "@/Store/eventStore";
const eventStore = useEventStore();
// const refresh = async () => {
    const { events } = toRefs(useEventStore());
const { fetchEvents } = useEventStore();
const foo = ref([]);
// };

onMounted(async () => {
//  const events = await eventStore.fetchEvents().then(() => {
//     foo.value = eventStore.events;
  
//  });

   await fetchEvents();
    
});

</script>

<template>
<div>
<!-- <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
   
    <div class=" flex flex-col p-4 leading-normal">
        <div class="relative">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Event {{ event?.id }} </h5>
          
        </div>
    
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white  m-1 p-1 absolute top-2 right-8 ...">Project {{ event?.value.id }}</h5>
      

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ event?.start_time }}</p>
        <div class="relative bottom-1 right-2">
            <UpdateEventModal :event="event" />
        </div>
     
    </div>
</a> -->
</div>
</template>
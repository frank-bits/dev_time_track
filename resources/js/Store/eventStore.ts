import { ref, Ref } from "vue";
import { defineStore } from 'pinia';
import { EventDataService } from "@Event/Service/EventService";
import { useFetch } from "@/Service/fetch";
import axios from 'axios';

export const useEventStore = defineStore('event-store', () => {

    const events: Ref<EventDataService | undefined> = ref([]);
    const error = ref('');
    const loading = ref(false);

    async function fetchEvents() {
        loading.value = true;
        await axios('/events/recent').then(response => {
            events.value = response.data
            loading.value = false;
        }).catch(err => {
            error.value = err
            loading.value = false;
        });
    }

    return {
        events,
        error,
        loading,
        fetchEvents
    }

})


<script setup lang="ts">
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";
import Event from "./Event.vue";

const showCreateModal = ref(false);
const passwordInput = ref<HTMLInputElement | null>(null);

const openCreateEventModal = () => {
  showCreateModal.value = true;
};

const closeModal = () => {
  showCreateModal.value = false;
};

</script>
<template>
  <button
    class="bg-orange-500 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded"
    @click="openCreateEventModal"
  >
    Create Event
  </button>
  <Modal :show="showCreateModal" @close="closeModal">
    <div class="relative">
      <div>
        <Event />
      </div>
      <div>
        <button
          class="absolute m-1 p-1 top-1 right-5 ... bg-orange-700 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded"
          @click="closeModal"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            />
          </svg>
        </button>
      </div>
    </div>
  </Modal>
</template>


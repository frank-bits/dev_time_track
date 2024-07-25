<script setup lang="ts">
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
const confirmingEventDeletion = ref(false);

const form = useForm({
  password: "",
});

const confirmEventDeletion = () => {
  confirmingEventDeletion.value = true;
};
const localId = ref("");

const deleteEvent = () => {
  router.delete("events/" + props.block.id);
  closeModal();
};

const closeModal = () => {
  confirmingEventDeletion.value = false;

  form.reset();
};
const props = defineProps<{
  block: {
    id: string;
    rate: any;
    start_time: string;
    end_time: string;
    project_id: string;
    activity_id: Object;
    rate_id: string;
    notes: string;
    date: string;
  };
}>();
</script>

<template>
  <section class="space-y-6">
    <!-- <DangerButton @click="confirmEventDeletion">Delete event</DangerButton> -->
    <button
      @click="confirmEventDeletion"
      type="submit"
      class="w-full text-white bg-orange-600 hover:bg-orange-300 font-bold focus:outline-none rounded-lg text-lg m-1 py-2.5 text-center"
    >
      Delete
    </button>
    <Modal :show="confirmingEventDeletion" @close="closeModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
          Are you sure you want to delete this event?
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
          Once the event is deleted, all of its resources and data will be permanently
          deleted.
        </p>

        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

          <DangerButton
            class="ms-3"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            @click="deleteEvent"
          >
            Delete Event
          </DangerButton>
        </div>
      </div>
    </Modal>
  </section>
</template>

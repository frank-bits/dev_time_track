<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { Head } from "@inertiajs/vue3";
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import PrimaryButtonVue from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { router } from '@inertiajs/vue3';


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


const  form = useForm({
  start_time:"",
  end_time: "",
  project_id: "",
  activity_id: "",
  notes: "",
  date: "",
});

const setForm = () => {
  if (!props.block) {
    return;
  } else {
    form.start_time = props.block.start_time;
    form.end_time = props.block.end_time;
    form.project_id = props.block.project_id;
    form.activity_id = props.block.rate.activity_id;
    form.rate_id = props.block.rate_id;
    form.notes = props.block.notes;
    form.date = props.block.date;
  }
  
};

const url = ref();
const setUrl = () => {
  url.value = "events/"+ props.block.id;
};

  
onMounted(() => {
  setForm();
});

const updateEvent = () => {
  router.put("events/"+ props.block.id, form);
};

</script>
<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="max-w-sm w-full lg:max-w-full lg:flex">
            <div
              class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal"
            >
              <div class="mb-8">
                <div class="text-gray-900 font-bold text-xl mb-2">
                  <form @submit.prevent="updateEvent" class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-2">
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label
                          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="grid-state"
                        >
                          Activity
                        </label>
                        <div class="relative">
                          <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state"
                            v-model="form.activity_id"
                          >
                            <option value="1">Development</option>
                          </select>
                          <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                          >
                            <svg
                              class="fill-current h-4 w-4"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                              />
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label
                          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="grid-state"
                        >
                          Projects
                        </label>
                        <div class="relative">
                          <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state"
                            v-model="form.project_id"
                          >
                            <option value="1">Project A-1</option>
                          </select>
                          <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                          >
                            <svg
                              class="fill-current h-4 w-4"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                              />
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label
                          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="grid-zip"
                        >
                          Task ID
                        </label>
                        <input
                          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                          id="grid-zip"
                          type="text"
                          placeholder="90210"
                        />
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label
                          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="grid-first-name"
                        >
                          start_time
                        </label>
                        <VueDatePicker v-model="form.start_time" :teleport="true" />
                        <InputError :message="form.errors.start_time" class="mt-2" />
                        <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                      </div>
                      <div class="w-full md:w-1/2 px-3">
                        <label
                          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="grid-last-name"
                        >
                          end_time
                        </label>
                        <VueDatePicker v-model="form.end_time" :teleport="true" />
                        <InputError :message="form.errors.end_time" class="mt-2" />
                        <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label
                          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="grid-password"
                        >
                          Notes
                        </label>
                        <input
                          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                          id="grid-password"
                          type="text"
                        />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="flex items-center">
                <button
                  class="bg-orange-500 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded"
                  @click="updateEvent"
                >
                  Save
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

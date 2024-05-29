<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FirstStep from '@/Pages/Frontend/steps/FirstStep.vue';
import SecondStep from '@/Pages/Frontend/steps/SecondStep.vue';
import FinalStep from '@/Pages/Frontend/steps/FinalStep.vue';

defineProps({
    parents: Object,
});

const step = ref(0)

const steps = [
  FirstStep,
  SecondStep,
  FinalStep,
]

const previous = () => {
  step.value --
}
const next = () => {
  step.value ++
}

</script>
<template>
  <FrontendLayout>
    <Head title=" Inscrire un enfant | Commune de Lemba" />

    <div
      class="flex flex-col rounded sm:max-w-full px-4 md:max-w-xl pt-48 md:py-24 mx-auto"
    >
      <ol
        class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse"
      >
        <li class="flex items-center text-blue-600 dark:text-blue-500">
          <span
            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500"
          >
            1
          </span>
          Parents
          <svg
            class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 12 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m7 9 4-4-4-4M1 9l4-4-4-4"
            />
          </svg>
        </li>
        <li class="flex items-center" :class="{'stepFull' : step >= 1 }">
          <span
            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400"
          >
            2
          </span>
          Enfant
          <svg
            class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 12 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m7 9 4-4-4-4M1 9l4-4-4-4"
            />
          </svg>
        </li>
        <li class="flex items-center" :class="{'stepFull' : step >= 2 }">
          <span
            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400"
          >
            3
          </span>
          Confirmation
        </li>
      </ol>

      <component :is="steps[step]"></component>

      <div class="flex items-center justify-end mt-4">
            <PrimaryButton @click="previous">
              Précédent
            </PrimaryButton>
            <PrimaryButton @click="next"
              class="ml-4"
            >
              Suivant
            </PrimaryButton>
          </div>
    </div>
  </FrontendLayout>
</template>

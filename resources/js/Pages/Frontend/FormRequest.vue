<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import { ref } from "vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import Multiselect from "vue-multiselect";

defineProps({
  parents: Object,
});

const notFound = ref(false)

const form = useForm({
  father_name: "",
  mother_name: "",
  father_id: "",
  mother_id: "",
  mother_id: "",
  wedding_act: "",
  selectedParent: null,
});

const parentSelect = (parent) => {
  return `${parent.father_name} & ${parent.mother_name}`;
};
</script>
<template>
  <FrontendLayout>
    <Head title=" Inscrire un enfant | Commune de Lemba" />

    <div
      class="flex flex-col rounded sm:max-w-full px-4 md:max-w-xl pt-48 md:py-40 mx-auto"
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
        <li class="flex items-center">
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
        <li class="flex items-center">
          <span
            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400"
          >
            3
          </span>
          Confirmation
        </li>
      </ol>

      <form class="py-6 w-full" @submit.prevent="submit" v-if="!notFound">
        <div>
            <InputLabel for="father_name" value="Nom du Père" />
            <TextInput
              id="father_name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.father_name"
            />
            <InputError class="mt-2" :message="form.errors.father_name" />
          </div>
          <div class="mt-2">
            <InputLabel for="mother_name" value="Nom de la Mère" />
            <TextInput
              id="mother_name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.mother_name"
            />
            <InputError class="mt-2" :message="form.errors.mother_name" />
          </div>
          <div class="mt-2">
            <InputLabel for="father_id" value="Identité du père" />
            <TextInput
              id="father_id"
              type="file"
              class="mt-1 block w-full"
              @input="form.father_id = $event.target.files[0]"
            />
            <InputError class="mt-2" :message="form.errors.father_id" />
          </div>
          <div class="mt-2">
            <InputLabel for="mother_id" value="Identité de la femme" />
            <TextInput
              id="mother_id"
              type="file"
              class="mt-1 block w-full"
              @input="form.mother_id = $event.target.files[0]"
            />
            <InputError class="mt-2" :message="form.errors.mother_id" />
          </div>
          <div class="mt-2">
            <InputLabel for="wedding_act" value="Acte de Mariage" />
            <TextInput
              id="wedding_act"
              type="file"
              class="mt-1 block w-full"
              @input="form.wedding_act = $event.target.files[0]"
            />
            <InputError class="mt-2" :message="form.errors.wedding_act" />
          </div>
          <div class="flex items-center justify-end mt-4">
            <Link
            href=""
            @click.prevent="!notFound"
            class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Déjà enregistré ? trouver
          </Link>
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Enregistrer
            </PrimaryButton>
          </div>
    </form>
      <form class="py-4 w-full" @submit.prevent="submit" v-else>
        <div class="">
          <InputLabel for="child" value="Votre couple" />
          <multiselect
            id="child"
            v-model="form.selectedParent"
            modelValue="form.selectedParent"
            :custom-label="parentSelect"
            :options="parents"
            placeholder="Trouvez votre couple"
            label="name"
            track-by="id"
          >
          </multiselect>
          <InputError class="mt-2" :message="form.errors.selectedParent" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link
            href=""
            @click="!notFound"
            class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Non trouvé? Créér
          </Link>
          <PrimaryButton
            class="ml-4 bg-light-tail-500 hover:bg-light-tail-500"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Enregistrer
          </PrimaryButton>
        </div>
      </form>
    </div>
  </FrontendLayout>
</template>

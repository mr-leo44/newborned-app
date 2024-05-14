<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Multiselect from 'vue-multiselect';
import {throttle} from 'lodash';


const props = defineProps({
  record: Array
})

const options = [
    {"index" : 0 ,"name" : "Non livré"},
    {"index" : 1 ,"name" : "Livré"},
]
const form = useForm({
    selected: null
});

const statusSelect = (option) => {
  return `${option.name}`
}

const submit = () => {
    form.put(route('records.update', props.record.id));
};

</script>
<template>
    <Head title="Enregistrement à l'Etat-civil" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier statut d'une demande à l'Etat-civil</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <InputLabel for="is_delivered" value="Statut" />
            <multiselect id="is_delivered" v-model="form.selected" modelValue="form.selected" :custom-label="statusSelect" :options="options" placeholder="Choisissez"
              label="name" track-by="name">
            </multiselect>
            <InputError class="mt-2" :message="form.errors.father_name" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Enregistrer
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>

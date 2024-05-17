<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import Multiselect from 'vue-multiselect';


defineProps({
  records: Object
})

const form = useForm({
  date: null,
  selectedRecord : null
});

const recordSelect = (record) => {
  return `${record.ref}`
}

const submit = () => {
   form.post(route('appointments.store'))
};

</script>
<template>
    <Head title="Rendez-vous" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Programmer un rendez-vous</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <InputLabel for="record" value="Enfant" />
            <multiselect id="record" v-model="form.selectedRecord" modelValue="form.selectedRecord" :options="records.data" track-by="id" :custom-label="recordSelect" placeholder="Selectionnez le dossier" label="ref"></multiselect>            <InputError class="mt-2" :message="form.errors.selectedRecord" />
            <InputError class="mt-2" :message="form.errors.selectedRecord" />
          </div>

            <div class="mt-2">
            <InputLabel for="date" value="Date prévue" />
            <TextInput
              id="date"
              type="date"
              class="mt-1 block w-full"
              v-model="form.date"
            />
            <InputError class="mt-2" :message="form.errors.date" />
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

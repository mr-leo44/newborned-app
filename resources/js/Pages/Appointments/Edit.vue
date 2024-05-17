<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Multiselect from 'vue-multiselect';


const props = defineProps({
  record: Array,
  appointment: Array
})

const form = useForm({
    record_id: props.record.id,
    date: props.appointment?.date
});

const submit = () => {
    form.put(route('appointments.update', props.appointment.id));
};

</script>
<template>
    <Head title="Rendez-vous" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rendez-vous Dossier n° {{ record.ref }}</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <InputLabel for="date" value="Date prevue" />
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

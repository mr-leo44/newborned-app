<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Multiselect from 'vue-multiselect';
import {throttle} from 'lodash';


defineProps({
  childs: Object
})


const form = useForm({
  child_id: "",
  is_delivered: false,
  selectedChild : null
});

const childSelect = (child) => {
  return `${child.name}`
}

const submit = () => {
  form.child_id = form.selectedChild.id
  form.post(route('records.store'))
};

</script>
<template>
    <Head title="Enregistrement à l'Etat-civil" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Enregister une demande à  l'Etat-civil</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <InputLabel for="child" value="Enfant" />
            <multiselect id="child" v-model="form.selectedChild" modelValue="form.selectedChild" :custom-label="childSelect" :options="childs.data" placeholder="Selectionnez l'enfant"
              label="name" track-by="id">
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
  
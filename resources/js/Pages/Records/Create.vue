<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Multiselect from 'vue-multiselect';
import {throttle} from 'lodash';


defineProps({
  childs: {
    type: Array,
    default: () => [] 
  }
})

const selectedChild = undefined

const form = useForm({
  child_id: null,
  is_delivered: false,
});

// const childSelect = (child) => {
//   return `${child.firstname} ${child.lastname} ${child.middlename}`
// }
const onSearchChildChange = throttle(function(term) {
  form.get('/records/create', {term}, {
    preserveState: true,
    preserveScroll: true,
    replace: true
  })
}, 300)

const onSelectedChild = (child) => {
  form.child_id = child.id
  console.log(form.child_id);
}

const submit = () => {
  form.post(route('records.store'), {
    child_id: form.child.id
  });
};

</script>
<template>
    <Head title="Enregistrement à l'Etat-civil " />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Enregister une demande à  l'Etat-civil</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <InputLabel for="child" value="Enfant" />
            <multiselect id="child" v-model="selectedChild" @search-change="onSearchChildChange" @input="onSelectedChild" :options="childs" placeholder="Selectionnez l'enfant"
              label="firstname" track-by="id">
            </multiselect>
            
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
  
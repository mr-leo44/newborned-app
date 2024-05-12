<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";

const props= defineProps({
  child: Object,
  parents: Array
})

const form = useForm({
  firstname: props.child?.firstname,
  lastname: props.child?.lastname,
  middlename: props.child?.middlename,
  city: props.child?.city,
  birthday: props.child?.birthday,
  hospital_act: null,
  parents_id: props.child?.parents_id,
  _method: 'PUT'
});

const submit = () => {
  
  form.post(route('childs.update', props.child.id));
};

</script>
<template>
    <Head title="Modifier Enfant" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier un Enfant</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <InputLabel for="firstname" value="Prenom de l'enfant" />
            <TextInput
              id="firstname"
              name="firstname"
              type="text"
              class="mt-1 block w-full"
              v-model="form.firstname"        
            />
            <InputError class="mt-2" :message="form.errors.firstname" />
            
          </div>

          <div class="mt-2">
            <InputLabel for="lastname" value="Nom de l'enfant" />
            <TextInput
              id="lastname"
              type="text"
              class="mt-1 block w-full"
              v-model="form.lastname"
              
            />
            <InputError class="mt-2" :message="form.errors.lastname" />
          </div>

          <div class="mt-2">
            <InputLabel for="middlename" value="Postnom de l'enfant" />
            <TextInput
              id="middlename"
              type="text"
              class="mt-1 block w-full"
              v-model="form.middlename"
              autofocus
            />
            <InputError class="mt-2" :message="form.errors.middlename" />
          </div>

          <div class="mt-2">
            <InputLabel for="city" value="Lieu de Naissance" />
            <TextInput
              id="city"
              type="text"
              class="mt-1 block w-full"
              v-model="form.city"
              
            />
            <InputError class="mt-2" :message="form.errors.city" />
          </div>
          <div class="mt-2">
            <InputLabel for="birthday" value="Date de Naissance" />
            <TextInput
              id="birthday"
              type="date"
              class="mt-1 block w-full"
              v-model="form.birthday"
            />
            <InputError class="mt-2" :message="form.errors.birthday" />
          </div>
          <div class="mt-2">
            <InputLabel for="hospital_act" value="Acte de Naissance" />
            <TextInput
              id="hospital_act"
              type="file"
              class="mt-1 block w-full"
              @input="form.hospital_act = $event.target.files[0]"
            />
            <InputError class="mt-2" :message="form.errors.hospital_act" />
          </div>

        <div class="mt-2">
          <InputLabel for="parents" value="Parents" />
            <select id="parents" v-model="form.parents_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option v-for="parent in parents" :key="parent.id" :value="parent.id">{{ parent.father_name}} & {{ parent.mother_name }}</option>
            </select>
            <InputError class="mt-2" :message="form.errors.parents_id" />
        </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Valider
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>
  
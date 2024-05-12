<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps({
    parent: Object
})
const form = useForm({
  father_name: props.parent.father_name,
  mother_name: props.parent.mother_name,
  father_id: null,
  mother_id: null,
  wedding_act: null,
  _method: "PUT",
});

const submit = () => {
    form.post(route('parents.update',props.parent.id));
};
</script>
<template>
    <Head title="Modifier Parents" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier un Parent</h2>
      </template>
      <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
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
            <InputLabel for="father_id" value="Identité du Père" />
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
  
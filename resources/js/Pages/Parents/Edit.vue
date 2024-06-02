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
  family_name: props.parent.family_name,
  father_name: props.parent.father_name,
  mother_name: props.parent.mother_name,
  parents_phone: props.parent.parents_phone,
  parents_email: props.parent.parents_email,
  father_id: null,
  mother_id: null,
  wedding_act: null,
  _method: "PUT",
});

const submit = () => {
  form.family_name = form.father_name+ ' & '+ form.mother_name
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
            <InputLabel for="parents_phone" value="Téléphone couple" />
            <TextInput
              id="parents_phone"
              type="text"
              class="mt-1 block w-full"
              v-model="form.parents_phone"
            />
            <InputError class="mt-2" :message="form.errors.parents_phone" />
          </div>
          <div class="mt-2">
            <InputLabel for="parents_email" value="E-Mail couple" />
            <TextInput
              id="parents_email"
              type="email"
              class="mt-1 block w-full"
              v-model="form.parents_email"
            />
            <InputError class="mt-2" :message="form.errors.parents_email" />
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
  
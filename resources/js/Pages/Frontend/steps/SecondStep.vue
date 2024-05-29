<script setup>
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";

const form = useForm({
  child_name: "",
  child_city: "",
  child_birthday: "",
  child_hospital_act: null,
});
</script>
<template>
    <form class="py-6 w-full">
          <div>
            <InputLabel for="child_name" value="Nom de l'enfant" />
            <TextInput
              id="child_name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.child_name"
            />
            <InputError class="mt-2" :message="form.errors.child_name" />
          </div>

          <div class="mt-2">
            <InputLabel for="child_city" value="Lieu de Naissance" />
            <TextInput
              id="child_city"
              type="text"
              class="mt-1 block w-full"
              v-model="form.child_city"
            />
            <InputError class="mt-2" :message="form.errors.child_city" />
          </div>

          <div class="mt-2">
            <InputLabel for="child_birthday" value="Date de Naissance" />
            <TextInput
              datepicker
              datepicker-autohide
              datepicker-format="dd/mm/yyyy"
              id="child_birthday"
              type="date"
              class="mt-1 block w-full"
              v-model="form.child_birthday"
            />
            <InputError class="mt-2" :message="form.errors.child_birthday" />
          </div>
          <div class="mt-2">
            <InputLabel for="child_hospital_act" value="Acte de Naissance" />
            <TextInput
              id="child_hospital_act"
              type="file"
              class="mt-1 block w-full"
              @input="form.child_hospital_act = $event.target.files[0]"
            />
            <InputError class="mt-2" :message="form.errors.child_hospital_act" />
          </div>
        </form>
</template>
<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
  family_name: "",
  father_name: "",
  mother_name: "",
  parents_phone: "",
  parents_email: "",
  father_id: "",
  mother_id: "",
  wedding_act: "",
  child_name: "",
  child_city: "",
  child_birthday: "",
  child_hospital_act: null,
})

const submit = () => {
  form.family_name = form.father_name+ ' & '+ form.mother_name
  form.post(route("submitRequest"));
};

</script>
<template>
  <Head title=" Inscrire un enfant | Commune de Lemba" />
  <FrontendLayout>
    <h5 class="mb-2 text-md text-center tracking-tight text-gray-900 pt-36 md:pt-24 dark:text-white">Vérifiez bien vos informations avant
      de le confirmer.</h5>
    <div class="rounded sm:max-w-full px-4 md:max-w-2xl mx-auto">
      <div>
        <form class="py-6 w-full inline-flex flex-col md:flex md:flex-row md:justify-between" @submit.prevent="submit">
          <div>
            <div>
              <InputLabel for="father_name" value="Nom du Père" />
              <TextInput id="father_name" placeholder="Nom Postnom Prenom" type="text" class="mt-1 block w-full" v-model="form.father_name" />
              <InputError class="mt-2" :message="form.errors.father_name" />
            </div>
            <div class="mt-2">
              <InputLabel for="mother_name" value="Nom de la Mère" />
              <TextInput id="mother_name" placeholder="Nom Postnom Prenom" type="text" class="mt-1 block w-full" v-model="form.mother_name" />
              <InputError class="mt-2" :message="form.errors.mother_name" />
            </div>
            <div class="mt-2">
            <InputLabel for="parents_phone" value="Téléphone couple" />
            <TextInput
              placeholder="Ex. 0987654321"
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
            placeholder="Ex. email@email.com"
              id="parents_email"
              type="email"
              class="mt-1 block w-full"
              v-model="form.parents_email"
            />
            <InputError class="mt-2" :message="form.errors.parents_email" />
          </div>
            <div class="mt-2">
              <InputLabel for="father_id" value="Identité du père" />
              <TextInput id="father_id" type="file" class="mt-1 block w-full"
                @input="form.father_id = $event.target.files[0]" />
              <InputError class="mt-2" :message="form.errors.father_id" />
            </div>
            <div class="mt-2">
              <InputLabel for="mother_id" value="Identité de la femme" />
              <TextInput id="mother_id" type="file" class="mt-1 block w-full"
                @input="form.mother_id = $event.target.files[0]" />
              <InputError class="mt-2" :message="form.errors.mother_id" />
            </div>
            <div class="mt-2">
              <InputLabel for="wedding_act" value="Acte de Mariage" />
              <TextInput id="wedding_act" type="file" class="mt-1 block w-full"
                @input="form.wedding_act = $event.target.files[0]" />
              <InputError class="mt-2" :message="form.errors.wedding_act" />
            </div>
          </div>
          <div>
            <div class="mt-6 md:mt-0">
              <InputLabel for="child_name" value="Nom de l'enfant" />
              <TextInput id="child_name" placeholder="Nom Postnom Prenom" type="text" class="mt-1 block w-full" v-model="form.child_name" />
              <InputError class="mt-2" :message="form.errors.child_name" />
            </div>
            <div class="mt-2">
              <InputLabel for="child_city" value="Lieu de Naissance" />
              <TextInput id="child_city" placeholder="Ex. Kinshasa" type="text" class="mt-1 block w-full" v-model="form.child_city" />
              <InputError class="mt-2" :message="form.errors.child_city" />
            </div>
            <div class="mt-2">
              <InputLabel for="child_birthday" value="Date de Naissance" />
              <TextInput datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" id="child_birthday" type="date"
                class="mt-1 block w-full" v-model="form.child_birthday" />
              <InputError class="mt-2" :message="form.errors.child_birthday" />
            </div>
            <div class="mt-2">
              <InputLabel for="child_hospital_act" value="Acte de Naissance" />
              <TextInput id="child_hospital_act" type="file" class="mt-1 block w-full"
                @input="form.child_hospital_act = $event.target.files[0]" />
              <InputError class="mt-2" :message="form.errors.child_hospital_act" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <PrimaryButton type="submit" class="ml-4" :class="{'opacity-25': form.processing}" :disabled="form.processing">
                Valider
              </PrimaryButton>
            </div>
          </div>
        </form>
      </div>
    </div>
  </FrontendLayout>
</template>

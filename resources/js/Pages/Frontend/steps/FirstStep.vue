<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import Multiselect from "vue-multiselect";

defineProps({
    parents: Object,
});

const notFound = ref(true)
const switchRecord = () => !notFound.value

const form = useForm({
    father_name: "",
    mother_name: "",
    father_id: "",
    mother_id: "",
    wedding_act: "",
    selectedParent: null,
});

const parentSelect = (parent) => {
    return `${parent.father_name} & ${parent.mother_name}`;
};
</script>
<template>
    <form class="py-6 w-full">
        <div>
            <InputLabel for="father_name" value="Nom du Père" />
            <TextInput id="father_name" type="text" class="mt-1 block w-full" v-model="form.father_name" />
            <InputError class="mt-2" :message="form.errors.father_name" />
        </div>
        <div class="mt-2">
            <InputLabel for="mother_name" value="Nom de la Mère" />
            <TextInput id="mother_name" type="text" class="mt-1 block w-full" v-model="form.mother_name" />
            <InputError class="mt-2" :message="form.errors.mother_name" />
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
        <div class="flex items-center justify-end mt-4">
            <Link
                href=""
                class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Déjà enregistré ? trouver
            </Link>
        </div>
    </form>
    <form class="py-6 w-full">
        <div>
            <InputLabel for="child" value="Votre couple" />
            <multiselect id="child" v-model="form.selectedParent" modelValue="form.selectedParent"
                :custom-label="parentSelect" :options="parents" placeholder="Trouvez votre couple" label="name"
                track-by="id">
            </multiselect>
            <InputError class="mt-2" :message="form.errors.selectedParent" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link
                class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Non trouvé? Créér
            </Link>
        </div>
    </form>
</template>
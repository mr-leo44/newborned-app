<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, Link } from "@inertiajs/vue3";


const props = defineProps({
    parent: Object,
    children: Array,
});

</script>

<template>

    <Head title="Parents" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Couple {{ parent.family_name }}</h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between m-2 p-2">
                    <div class="text-dark-primary font-semibold text-xl">
                Enfants
                </div>
                    <Link
                    href="/childs/create"
                    class="
                        px-4
                        py-2
                        bg-slate-700
                        hover:bg-slate-500
                        text-white
                        rounded-md
                    "
                    >Nouvel Enfant</Link
                    >
          </div>
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="
                  text-xs text-gray-700
                  uppercase
                  bg-gray-50
                  dark:bg-gray-700 dark:text-gray-400
                ">
                            <tr>
                                <th scope="col" class="py-3 px-6">Noms</th>
                                <th scope="col" class="py-3 px-6">Lieu naissance</th>
                                <th scope="col" class="py-3 px-6">Date naissance</th>
                                <th scope="col" class="py-3 px-6"></th>
                            </tr>
                        </thead>
                        <tbody v-if="children">
                            <tr v-for="child in children" :key="child.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="
                      py-4
                      px-6
                    ">
                                    {{ child.name }}
                                </td>
                                <td class="py-4 px-6">{{ child.city }}</td>
                                <td class="py-4 px-6">{{ child.birthday }}</td>
                                <td class="py-4 px-6">
                                    <Link :href="route('childs.edit', child.id)"
                                        class="font-medium text-blue-500 hover:text-blue-700 mr-2">Edit</Link>
                                    <Link :href="route('childs.destroy', child.id)" method="delete" as="button"
                                        type="button" class="font-medium text-red-500 hover:text-red-700 mr-2">Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td scope="col" colspan="3" class="px-6 py-3 font-semibold">Pas d'enfants trouvés</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
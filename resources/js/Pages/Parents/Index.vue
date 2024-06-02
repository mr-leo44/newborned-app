<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  parents: Object,
});
</script>
<template>

  <Head title="Parents" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Parents</h2>
    </template>
    
    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end">
          <div id="alert-message" v-if="$page.props.flash.success"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
              <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
              {{ $page.props.flash.success }}
            </div>
            <button type="button"
              class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:green-blue-400 dark:hover:bg-gray-700"
              data-dismiss-target="#alert-message" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
            </button>
          </div>
        </div>
        <div class="flex justify-end m-2 p-2">
          <Link href="/parents/create" class="
                px-4
                py-2
                bg-indigo-500
                hover:bg-indigo-700
                text-white
                rounded-md
              ">Nouveau Parent</Link>
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
                <th scope="col" class="py-3 px-6">Nom Couple</th>
                <th scope="col" class="py-3 px-6">Email</th>
                <th scope="col" class="py-3 px-6">Telephone</th>
                <th scope="col" class="py-3 px-6"></th>
              </tr>
            </thead>
            <tbody v-if="parents.data">
              <tr v-for="parent in parents.data" :key="parent.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="
                      py-4
                      px-6
                    ">
                  {{ parent.family_name }}
                </td>
                <td class="py-4 px-6">{{ parent.parents_email }}</td>
                <td class="py-4 px-6">{{ parent.parents_phone }}</td>
                <td class="py-4 px-6">
                  <Link :href="route('parents.show', parent.id)"
                    class="font-medium text-blue-500 hover:text-blue-700 mr-2">
                  Voir plus</Link>
                  <Link :href="route('parents.edit', parent.id)"
                    class="font-medium text-emerald-500 hover:text-blue-700 mr-2">Edit</Link>
                  <Link :href="route('parents.destroy', parent.id)" method="delete" as="button" type="button"
                    class="font-medium text-red-500 hover:text-red-700 mr-2">Delete</Link>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td scope="col" colspan="3" class="px-6 py-3 font-semibold">Pas de couples trouvés</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

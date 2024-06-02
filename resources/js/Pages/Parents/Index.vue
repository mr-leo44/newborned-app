<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import SuccessAlert from "@/Components/SuccessAlert.vue"
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
        <div class="flex justify-end" v-if="$page.props.flash.success">
          <SuccessAlert :message="$page.props.flash.success" />
        </div>
        <div class="flex justify-end m-2 p-2">
          <Link href="/parents/create" class="
                px-4
                py-2
                bg-slate-700
                hover:bg-slate-500
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

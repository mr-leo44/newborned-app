<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import SuccessAlert from "@/Components/SuccessAlert.vue"
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  records: Object,
});
</script>
<template>
    <Head title="Enregistrements" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Enregistrements</h2>
      </template>

      <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end" v-if="$page.props.flash.success">
          <SuccessAlert :message="$page.props.flash.success" />
        </div>
          <div class="flex justify-end m-2 p-2">
            <Link
              href="/records/create"
              class="
                px-4
                py-2
                bg-slate-700
                hover:bg-slate-500
                text-white
                rounded-md
              "
              >Nouvel Enregistrement</Link
            >
          </div>
          <div class="overflow-x-auto relative">
            <table
              class="w-full text-sm text-center text-gray-500 dark:text-gray-400"
            >
              <thead
                class="
                  text-xs text-gray-700
                  uppercase
                  bg-gray-50
                  dark:bg-gray-700 dark:text-gray-400
                "
              >
                <tr>
                  <th scope="col" class="py-3 px-6">N° Ref</th>
                  <th scope="col" class="py-3 px-6">Nom Enfant</th>
                  <th scope="col" class="py-3 px-6">Statut</th>
                  <th scope="col" class="py-3 px-6"></th>
                </tr>
              </thead>
              <tbody v-if="records.data">
                <tr
                  v-for="record in records.data"
                  :key="record.id"
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                >
                  <td class="py-4px-6">{{ record.ref }}</td>
                  <td class="py-4 px-6">{{ record.child.name }}</td>
                  <td class="py-4 px-6"><span v-if="record.is_delivered">Delivré</span><span v-else>Non delivré</span></td>
                  <td class="py-4 px-6">
                    <Link
                      :href="route('records.edit', record.id)"
                      class="font-medium text-blue-500 hover:text-blue-700 mr-2"
                      :class="{'invisible' : record.is_delivered}"
                      >Modifier Statut</Link
                    >
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td scope="col" colspan="3" class="px-6 py-3 font-semibold">Pas d'enregistrements trouvés</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import SuccessAlert from "@/Components/SuccessAlert.vue"
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  appointments: Array,
});
</script>
<template>

  <Head title="Rendez-vous" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rendez-vous</h2>
    </template>

    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end" v-if="$page.props.flash.success">
          <SuccessAlert :message="$page.props.flash.success" />
        </div>
        <div class="flex justify-end m-2 p-2">
          <Link href="/appointments/create" class="
                px-4
                py-2
                bg-slate-700
                hover:bg-slate-500
                text-white
                rounded-md
              ">Nouveau Rendez-vous</Link>
        </div>
        <div class="overflow-x-auto relative">
          <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="py-3 px-6">N° Dossier</th>
                <th scope="col" class="py-3 px-6">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody v-if="appointments">
              <tr v-for="appointment in appointments" :key="appointment.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4px-6">
                  <Link :href="route('records.show', appointment.record.id)" class="hover:text-blue-700">{{
                    appointment.record.ref }}</Link>
                </td>
                <td class="py-4 px-6"><span v-if="appointment.date">{{ appointment.date }}</span><span v-else>Non
                    programmé</span></td>
                <td class="py-4 px-6">
                  <Link :href="route('appointments.edit', appointment.id)"
                    class="font-medium text-blue-500 hover:text-blue-700 mr-2"><span
                    v-if="appointment.date">Reprogrammer</span><span v-else>Programmer</span></Link>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td scope="col" colspan="3" class="px-6 py-3 font-semibold">Pas de Rendez-vous enregistré</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

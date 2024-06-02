<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  undelivered_records: Number,
  parents_count: Number,
  childs_count: Number,
  record_today: Object,
  appointments: Array
});
</script>

<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Bienvenue {{ $page.props.auth.user.name }}
      </h2>
    </template>
    <div>
      <div class="max-w-7xl mx-auto justify-center sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 grid-rows-1 gap-2 md:gap-3 my-6">
          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-lg lg:text-xl font-medium tracking-tight text-gray-900 dark:text-white">
              {{ undelivered_records }} Enregistrement<span v-if="undelivered_records > 1">s</span>
              à traiter
            </h5>
            <Link :href="route('records.index')"
              class="inline-flex items-center mt-6 px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Voir
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            </Link>
          </div>
          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-lg lg:text-xl font-medium tracking-tight text-gray-900 dark:text-white">
              {{ parents_count }} Couple<span v-if="parents_count > 1">s</span>
              enregistré<span v-if="parents_count > 1">s</span>
            </h5>
            <Link :href="route('parents.create')"
              class="inline-flex items-center mt-6 px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Ajouter
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            </Link>
          </div>
          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-lg lg:text-xl font-medium tracking-tight text-gray-900 dark:text-white">
              {{ childs_count }} Enfant<span v-if="childs_count > 1">s</span>
              inscrit<span v-if="childs_count > 1">s</span>
            </h5>
            <Link :href="route('childs.create')"
              class="inline-flex items-center mt-6 px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Ajouter
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            </Link>
          </div>
        </div>
        <div class="grid md:grid-cols-2 sm:grid-rows-1 sm:gap-1 md:gap-5 mt-0 md:mt-6">
          <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-6">
            <div class="flex justify-between">
              <h3 class="text-2xl font-normal">Aujourd'hui</h3>
              <Link :href="route('records.index')"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Voir plus
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
              </Link>
            </div>
            <div class="relative my-6">
              <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="py-3 px-6">N° Ref</th>
                    <th scope="col" class="py-3 px-6">Nom Enfant</th>
                    <th scope="col" class="py-3 px-6">Statut</th>
                  </tr>
                </thead>
                <tbody v-if="record_today">
                  <tr v-for="record in record_today.data" :key="record.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4px-6">{{ record.ref }}</td>
                    <td class="py-4 px-6">{{ record.child.name }}</td>
                    <td class="py-4 px-6">
                      <span v-if="record.is_delivered">Delivré</span><span v-else>Non delivré</span>
                    </td>
                  </tr>
                </tbody>
                <tbody v-else>
                  <tr>
                    <td scope="col" colspan="3" class="px-6 py-3 font-semibold">Pas de demande Aujourd'hui</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-6">
            <div class="flex justify-between">
              <h3 class="text-2xl font-medium">Rendez-vous</h3>
              <Link :href="route('appointments.index')"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Voir plus
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
              </Link>
            </div>
            <div class="relative my-6">
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
                    <td scope="col" colspan="3" class="px-6 py-3 font-semibold">Pas de Rendez-vous non programé</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

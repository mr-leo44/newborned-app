<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  undelivered_records: Number,
  parents_count: Number,
  childs_count: Number,
  record_today: Array,
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
    <div class="">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-3 my-6">
          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
          >
            <h5
              class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"
            >
              {{ undelivered_records }} Enregistrement<span
                v-if="undelivered_records > 1"
                >s</span
              >
              à traiter
            </h5>
            <Link
              :href="route('records.index')"
              class="inline-flex items-center mt-6 px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Voir
              <svg
                class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9"
                />
              </svg>
            </Link>
          </div>
          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
          >
            <h5
              class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"
            >
              {{ parents_count }} Couple<span v-if="parents_count > 1">s</span>
              enregistré<span v-if="parents_count > 1">s</span>
            </h5>
            <Link
              :href="route('parents.create')"
              class="inline-flex items-center mt-6 px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Ajouter
              <svg
                class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9"
                />
              </svg>
            </Link>
          </div>
          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
          >
            <h5
              class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"
            >
              {{ childs_count }} Enfant<span v-if="childs_count > 1">s</span>
              inscrit<span v-if="parents_count > 1">s</span>
            </h5>
            <Link
              :href="route('childs.create')"
              class="inline-flex items-center mt-6 px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Ajouter
              <svg
                class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9"
                />
              </svg>
            </Link>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-5 mt-8">
          <div
            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-6"
          >
            <div class="flex justify-between">
              <h3 class="text-3xl font-semibold">Aujourd'hui</h3>
              <Link
                :href="route('records.index')"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                Voir plus
                <svg
                  class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 14 10"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                  />
                </svg>
              </Link>
            </div>
            <div class="relative my-6">
              <table
                class="w-full text-sm text-center text-gray-500 dark:text-gray-400"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="py-3 px-6">N° Ref</th>
                    <th scope="col" class="py-3 px-6">Nom Enfant</th>
                    <th scope="col" class="py-3 px-6">Statut</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="record in record_today.data"
                    :key="record.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <td class="py-4px-6">{{ record.ref }}</td>
                    <td class="py-4 px-6">{{ record.child.name }}</td>
                    <td class="py-4 px-6">
                      <span v-if="record.is_delivered">Delivré</span
                      ><span v-else>Non delivré</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-6"
          >
            <div class="flex justify-between">
              <h3 class="text-3xl font-semibold">Rendez-vous</h3>
              <Link
                :href="route('appointments.create')"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                Ajouter
                <svg
                  class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 14 10"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                  />
                </svg>
              </Link>
            </div>
            <div class="relative my-6">
              <table
                class="w-full text-sm text-center text-gray-500 dark:text-gray-400"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="py-3 px-6">N° Dossier</th>
                    <th scope="col" class="py-3 px-6">Concerne</th>
                    <th scope="col" class="py-3 px-6">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="record in record_today.data"
                    :key="record.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <td class="py-4px-6">{{ record.ref }}</td>
                    <td class="py-4 px-6">{{ record.child.name }}</td>
                    <td class="py-4 px-6">
                      20-04-2024
                    </td>
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

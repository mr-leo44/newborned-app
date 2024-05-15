<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>
<template>
  <Head title="Rendez-vous" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Rendez-vous
      </h2>
    </template>

    <div class="py-12">La Liste à afficher</div>
  </AuthenticatedLayout>
</template>

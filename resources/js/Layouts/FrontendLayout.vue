<script setup>
import Header from "@/Components/Frontend/utils/Header.vue";
import Footer from "@/Components/Frontend/utils/Footer.vue";
</script>

<template>
  <div class="bg-slate-200 dark:bg-slate-900">
    <!-- Header -->
    <Header />
    <main class="min-h-[85vh] md:min-h-[83vh]">
      <slot />
    </main>
    <!-- Footer -->
    <Footer />
  </div>
</template>

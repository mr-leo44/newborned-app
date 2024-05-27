<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from "@inertiajs/vue3";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";



</script>

<template>
    <FrontendLayout>
        <Head title="Commune de Lemba | Accueil" />
        <Hero />
        <Promote />
        <About />
    </FrontendLayout>
</template>
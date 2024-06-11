<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from "@inertiajs/vue3";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Contact from "@/Components/Frontend/Contact.vue";



</script>

<template>
    <Head title="Accueil | Commune de Lemba" />
    <FrontendLayout>
        <Hero />
        <Promote />
        <About />
        <Contact />
        

    </FrontendLayout>
</template>

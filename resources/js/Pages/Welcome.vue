<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from "@inertiajs/vue3";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Contact from "@/Components/Frontend/Contact.vue";
import Popup from "@/Components/Popup.vue";



</script>

<template>
    <FrontendLayout>
        <Popup v-if="$page.props.flash.success" :caption="$page.props.flash.success" />
        <Head title="Accueil | Commune de Lemba" />
        <Hero />
        <Promote />
        <About />
        <Contact />
    </FrontendLayout>
</template>

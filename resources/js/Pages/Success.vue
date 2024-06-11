<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from "@inertiajs/vue3";

</script>

<template>

    <Head title="Accueil | Commune de Lemba" />
    <FrontendLayout>
        <section class="
            lg:h-[90vh]
            flex
            items-center
            justify-center
            bg-light-primary
            dark:bg-dark-primary
            mx-auto
            py-20
            lg:py-0
            overflow-hidden
        ">
            <div class="">
                <div
                    class="max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-24">
                    <img class="rounded-t-lg" src="" alt="" />
                    <div class="p-5 ">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Felicitations</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $page.props.flash.success }}</p>
                            <p>{{ url }}</p>
                        <Link :href="route('welcome')"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center 
              bg-slate-600
              text-white
              hover:bg-gray-800 hover:text-gray-100
              dark:hover:bg-dark- rounded-sm dark:hover:text-dark-navy-100 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-dark-secondary dark:focus:ring-slate-800">
                        Confirmer
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        </Link>
                    </div>
                </div>

            </div>

        </section>
    
        {{ locationbar }}

    </FrontendLayout>
</template>

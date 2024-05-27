<script setup>
import { Link } from "@inertiajs/vue3";

const publicAsset = (asset) => window.location+'assets/'+asset
</script>
<template>
    <section
    id="home"

    class="
      lg:h-[90vh]
      flex
      items-center
      bg-light-primary
      dark:bg-dark-primary
      py-20
      lg:py-0
      overflow-hidden
    "
  >
    <div
      class="container mx-auto h-full">
      <div class="flex flex-col md:flex-row items-center h-full pt-8">
        <div class="flex-1 flex flex-col items-center lg:items-start">
          <h1
            class="
              text-4xl
              leading-[44px]
              md:text-5xl md:leading-tight
               lg:leading-[1.2]
              font-bold
              md:tracking-[-2px]
            "
          >
          Simplifiez vos démarches <br />d'état civil dans votre commune
          </h1>
          <p class="
              pt-4
              pb-8
              md:pt-6 md:pb-12
              max-w-[480px]
              text-lg text-center
              lg:text-left
            ">
            Inscrivez-vous facilement aux services d'état civil de votre commune en RDC depuis votre ordinateur ou votre smartphone. Notre plateforme en ligne vous guide à travers le processus d'inscription de manière rapide et sécurisée sans que vous ayez à vous déplacer.
        </p>
          <Link
            class="
              btn btn-md
              bg-slate-600
              text-white
              hover:bg-indigo-600 hover:text-gray-100
              dark:hover:bg-dark-secondary dark:hover:text-dark-navy-100
              md:btn-lg
              transition-all
              uppercase
              font-semibold
            "
            :href="route('formRequest')"
          >
            Inscrire son enfant
        </Link>

        </div>
        <div class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0">
          <img
            class="rounded-lg"
            :src="publicAsset('images/Babies.png')"
            alt="Hero"
          />
        </div>
      </div>
    </div>

    </section>
</template>

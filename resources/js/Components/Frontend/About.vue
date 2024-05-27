<script setup>
const publicAsset = (asset) => window.location+'assets/'+asset 
</script>
<template>
    <section id="about" class="section bg-light-secondary dark:bg-dark-secondary">
      <div
        class="container mx-auto"
        v-motion
        :initial="{
          opacity: 0,
          y: 100,
        }"
        :visible="{
          opacity: 1,
          y: 0,
        }"
      >
        <div class="flex flex-col md:flex-row gap-12">
          <img
            class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"
            :src="publicAsset('images/family.png')"
            alt="about"
          />
          <div
            class="
              flex flex-col
              items-center
              text-center
              lg:items-start lg:text-left
            "
          >
            <div class="flex flex-col">
              <h2 class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3">
                Ce que dit la loi ...
              </h2>
              <hr class="mb-3 opacity-90 dark:opacity-5" />
              <p class="mb-8 text-justify">
                Conformément à la loi en vigueur en RDC, l'inscription des naissances à l'état civil est obligatoire. Tous les enfants nés sur le territoire congolais doivent être déclarés à l'officier d'état civil de la commune dans laquelle ils sont nés.
                La déclaration de naissance doit être effectuée dans un délai de 30 jours suivant l'accouchement. Ce délai peut être exceptionnellement porté à 60 jours en cas de force majeure.

<br />
<br />
<span class="font-semibold text-lg">
    Sont tenus de faire cette déclaration :
</span>
                    <br />
                        - Le père de l'enfant
                    <br />
                    - À défaut du père, la mère de l'enfant
                    <br />
                         - À défaut des parents, toute personne ayant assisté à l'accouchement
                    
                <br />
                <br />
                L'acte de naissance délivré suite à cette déclaration fait foi de l'identité de l'enfant et constitue un document essentiel tout au long de sa vie.
              </p>
            </div>
        </div>
        </div>
      </div>
    </section>
  </template>
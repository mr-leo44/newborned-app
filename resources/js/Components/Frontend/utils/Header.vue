<script setup>
import { ref, onMounted } from "vue";

const scrollBg = ref(false);

const setScrollBg = (value) => {
    scrollBg.value = value;
};

onMounted(() => {
    window.addEventListener("scroll", () => {
        return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
    });
});
</script>
<template>
    <nav
        class="border-gray-20 w-full fixed"
        :class="{
            'bg-light-primary dark:bg-dark-primary': scrollBg,
            'bg-white dark:bg-slate-800': !scrollBg,
        }"
    >
        <div
            class="max-w-screen-xl flex flex-row gap-x-4 items-center justify-between mx-auto p-4"
        >
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span
                    class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap dark:text-white"
                    >Commune de Lemba</span
                >
            </a>
            <div class="w-full md:w-auto">
                <ul
                    class="font-normal p-4 md:p-0 border rounded-lg md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <li>
                        <a
                            :href="route('formRequest')"
                            class="block text-md text-center py-2 pr-4 pl-3 bg-light-tail-500 text-white rounded dark:text-dark-navy-100 dark:hover:text-white"
                            >Inscrire <span class="hidden md:inline-block"> son enfant</span></a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import Default from "~/Layout/Default.vue";
import Spacer  from "~/Components/Layout/Spacer.vue";
import {ref}   from "vue";

defineOptions({layout: Default})

const props = defineProps({
    teams: {
        type: Array,
        required: true
    },
})
</script>

<template>
    <Spacer/>
    <div class="flex flex-col w-full mb-5">
        <h2 class="section-header">Equipos de la Liga Nacional</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
        <section v-for="team in teams" class="hover:bg-base-200 p-7 rounded-2xl flex flex-col items-center">
            <a :href="route('national-league.teams.club', {'sheet_name': team.sheet_name})">
                <picture class="h-64 inline-flex items-center">
                    <img :src="team.logo" :alt="`Escudo de ${team.name}`" class="object-contain max-h-full">
                </picture>
            </a>
            <h2 class="text-3xl text-center mt-4">{{ team.name }}</h2>
        </section>
    </div>

</template>

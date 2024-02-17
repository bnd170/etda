<script setup>
import Default from "~/Layout/Default.vue";
import Header  from "~/Components/League/Header.vue";
import {Head}  from "@inertiajs/vue3";
import Card    from 'primevue/card';
import GameCalendar from "~/Components/League/Calendar/Game.vue";

defineProps({
    games: {
        type: Array,
        required: true
    },
})

defineOptions({layout: Default})

const humanizeDate = (rawDate) => {
    const date = new Date(rawDate);
    return date.toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        weekday: 'long'
    });
}
</script>

<template>
    <Head>
        <title>Calendario - Liga nacional de fútbol 7 PC/DCA</title>
    </Head>
    <div class="container mx-auto">
        <Header/>
        <Card>
            <template #title>
                <h3 class="box-title">CALENDARIO</h3>
            </template>
            <template #content>
                <div v-for="(dateGames, date) in games" class="mt-5 mb-16">
                    <time class="font-['Cabin'] font-bold text-xl text-primary-500 capitalize flex mb-5">{{ humanizeDate(date) }}</time>
                    <GameCalendar v-for="game in dateGames" :game="game"/>
                </div>
            </template>
        </Card>
    </div>
</template>

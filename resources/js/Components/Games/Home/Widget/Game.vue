<script setup>
import PendingGameTeam from "~/Components/Games/Game/Widget/PendingGameTeam.vue";
import PlayedGameTeam  from "~/Components/Games/Game/Widget/PlayedGameTeam.vue";
import {computed}      from "vue";
import {formatDate}    from "~/Utils/date.js";

const props = defineProps({
    game: {
        type: Object,
        required: true
    }
});

const day = computed(() => formatDate(props.game.date, {weekday: 'short'}).toUpperCase());
const date = computed(() => formatDate(props.game.date, {day: '2-digit', month: '2-digit', year: 'numeric'}).replace(/\//g, '.'));
const hour = computed(() => formatDate(props.game.date, {hour: '2-digit', minute: '2-digit'}));
</script>

<template>
    <div class="group/item border-2 border-white lg:mx-0.5 2xl:mx-1.5 h-full flex flex-col ">
        <div class="bg-white flex flex-row px-5 py-2 font-bold">
            Jornada {{ game.round }}
        </div>
        <div class="relative">
            <div class="flex flex-row py-3 px-5 items-start flex-grow" v-if="game.status === 'pending'">
                <PendingGameTeam :team="game.home_team"/>
                <div class="w-2/12 font-serif font-bold text-center self-center">VS</div>
                <PendingGameTeam :team="game.away_team"/>
            </div>
            <div class="flex flex-row py-3 px-5 items-start flex-grow" v-else>
                <PlayedGameTeam :team="game.home_team" :score="game.home_team_score"/>
                <div class="w-2/12 font-serif font-bold text-center self-center">VS</div>
                <PlayedGameTeam :team="game.away_team" :score="game.away_team_score"/>
            </div>
            <div class="overlay group-hover/item:opacity-100" v-if="game.status !== 'pending'">
                <a :href="route('national-league.game', {'slug': game.slug})"
                   class="btn btn-wide btn-outline text-xl">Ver estadísticas</a>
            </div>
        </div>
        <div class="flex flex-row px-5 py-2 font-bold items-center bg-white">
            <div class="w-1/2">
                <p>{{ day }} {{ date }}</p>
                <p class="font-bold">{{ hour }}</p>
            </div>
            <div class="w-1/2 text-right">
                <p>{{ game.location }}</p>
                <p>{{ game.state }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.overlay {
    @apply absolute w-full h-full top-0 left-0 opacity-0;
    backdrop-filter: blur(10px);
    transition: opacity 0.3s ease-in-out;
}

.overlay a, .overlay a:active {
    @apply relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2;
}
</style>

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
    <div class="group/item border-2 border-neutral lg:mx-0.5 2xl:mx-1.5 h-full flex flex-col ">
        <div class="bg-neutral flex flex-row px-5 py-2 font-bold">
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
                   class="btn btn-wide btn-outline text-xl btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="32px" width="32px" id="Capa_1"
                         viewBox="0 0 465.797 465.797" xml:space="preserve">
<path
    d="M423.532,0H42.264c-11.046,0-20,8.954-20,20v282.563c0,11.046,8.954,20,20,20h125.651l-50.474,115.203  c-4.433,10.117,0.175,21.912,10.293,26.346c2.612,1.143,5.335,1.686,8.016,1.686c7.701,0,15.041-4.474,18.329-11.979l57.507-131.256  h42.625l57.507,131.256c3.289,7.506,10.628,11.979,18.329,11.979c2.68,0,5.404-0.542,8.016-1.686  c10.118-4.434,14.726-16.228,10.293-26.346l-50.474-115.203h125.651c11.046,0,20-8.954,20-20V20C443.532,8.954,434.578,0,423.532,0z   M151.724,246.587c0,3.879-3.144,7.023-7.023,7.023h-30.433c-3.879,0-7.023-3.144-7.023-7.023V93.587  c0-3.879,3.145-7.023,7.023-7.023h30.433c3.879,0,7.023,3.144,7.023,7.023V246.587z M220.667,246.587  c0,3.879-3.144,7.023-7.023,7.023H183.21c-3.879,0-7.023-3.144-7.023-7.023V133.011c0-3.879,3.144-7.023,7.023-7.023h30.433  c3.879,0,7.023,3.144,7.023,7.023V246.587z M289.609,246.587c0,3.879-3.144,7.023-7.023,7.023h-30.433  c-3.879,0-7.023-3.144-7.023-7.023v-78.283c0-3.879,3.144-7.023,7.023-7.023h30.433c3.879,0,7.023,3.145,7.023,7.023V246.587z   M358.552,246.587c0,3.879-3.144,7.023-7.023,7.023h-30.433c-3.879,0-7.023-3.144-7.023-7.023v-42.729  c0-3.879,3.144-7.023,7.023-7.023h30.433c3.879,0,7.023,3.145,7.023,7.023V246.587z"/>
</svg>
                    Ver estadísticas</a>
            </div>
        </div>
        <div class="flex flex-row px-5 py-2 font-bold items-center bg-neutral">
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

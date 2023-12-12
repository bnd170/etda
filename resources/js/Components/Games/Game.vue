<script setup>
import Team               from "~/Components/Games/Game/Team.vue";
import {computed, toRefs} from "vue";

const props = defineProps({
    game: {
        type: Object,
        required: true
    }
});

const {game} = toRefs(props);

const formatDate = (options) => {
    const date = new Date(game.value.date);
    return new Intl.DateTimeFormat('es-ES', options).format(date);
};

const day = computed(() => formatDate({weekday: 'short'}).toUpperCase());
const date = computed(() => formatDate({day: '2-digit', month: '2-digit', year: 'numeric'}).replace(/\//g, '.'));
const hour = computed(() => formatDate({hour: '2-digit', minute: '2-digit'}));
</script>

<template>
    <div class="border-2 border-neutral lg:mx-0.5 2xl:mx-1.5 h-full flex flex-col">
        <div class="bg-neutral flex flex-row px-5 py-2 font-bold">
            Jornada {{ game.journey }}
        </div>
        <div class="flex flex-row py-3 px-5 items-start flex-grow">
            <Team :team="game.home_team"/>
            <div class="w-2/12 font-serif font-bold text-center self-center">VS</div>
            <Team :team="game.away_team"/>
        </div>
        <div class="flex flex-row px-5 py-2 font-bold items-center bg-neutral">
            <div class="w-1/2">
                <p>{{ day }} {{ date }}</p>
                <p class="font-bold">{{ hour }}</p>
            </div>
            <div class="w-1/2 text-right">
                <p>{{ game.location }}</p>
                <p>{{ game.province }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

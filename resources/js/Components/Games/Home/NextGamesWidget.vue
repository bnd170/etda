<template>
    <div class="flex flex-col">
        <div class="flex flex-col w-full mb-5">
            <h2 class="section-header">Próximos partidos</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">
            <Game :game="game" v-for="game in games" :key="game.id"/>
        </div>
    </div>
</template>

<script setup>
import Game from "~/Components/Games/Game.vue";

defineProps({
    games: {
        type: Array,
        required: true
    }
});
</script>

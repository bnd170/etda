<template>
    <article class="ml-0 flex flex-row justify-between p-2 rounded-lg w-full">
        <section class="flex flex-row">
            <div class="team-container flex flex-col items-center col-span-1">
                <img :src="getFlagUrl(match.game_info.homeIso)" :alt="match.game_info.home + ' flag'" class="w-[40px] object-cover">
                <p class="text-lg">{{ match.game_info.home }}</p>
            </div>
            <p class="text-center col-span-1">vs</p>
            <div class="team-container flex flex-col items-center col-span-1">
                <img :src="getFlagUrl(match.game_info.awayIso)" :alt="match.game_info.away + ' flag'" class="w-[40px] object-cover">
                <p class="text-lg">{{ match.game_info.away }}</p>
            </div>
        </section>
        <span class="font-medium px-3 py-3 rounded-full text-sm text-center col-span-1 w-1/3"
              :class="match.selection ? 'dark:bg-surface-950 bg-stone-200 text-xl font-black' : 'bg-surface-800/70 text-white-500'">
          {{ formatPrediction(match) }}
        </span>
    </article>
</template>

<script setup>
import {getFlagUrl} from '~/Utils/flags.js';

const props = defineProps({
    match: {
        type: Object,
        required: true
    }
});

const formatPrediction = (match) => {
    if (!match.selection) return 'Sin selección';
    if (match.selection==='X') return `Empate a ${match.drawScore}`;
    return `${match.homeScore} - ${match.awayScore}`;
};
</script>

<style scoped>
.team-container {
    min-width: 120px;
}
</style>

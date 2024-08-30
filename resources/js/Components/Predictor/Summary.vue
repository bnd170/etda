<template>
    <article class="ml-0 grid grid-cols-4 items-center p-2 rounded-lg w-full">
        <div class="flex flex-col items-center col-span-1">
            <img :src="getFlagUrl(match.homeIso, 32)" :alt="match.home + ' flag'" class="w-[32px] object-cover">
            <p>{{ match.home }}</p>
        </div>
        <p class="text-center col-span-1">vs</p>
        <div class="flex flex-col items-center col-span-1">
            <img :src="getFlagUrl(match.awayIso, 32)" :alt="match.away + ' flag'" class="w-[32px] object-cover">
            <p>{{ match.away }}</p>
        </div>
        <span class="font-medium px-3 py-3 rounded-full text-sm text-center col-span-1"
              :class="match.selection ? 'bg-surface-900 text-xl font-black' : 'bg-surface-900/70 text-white-500'">
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

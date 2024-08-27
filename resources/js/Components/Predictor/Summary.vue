<template>
    <li class="flex justify-between items-center p-2 rounded-lg bg-gray-50">
    <span class="text-gray-700">
      {{ match.homeFlag }} {{ match.home }} vs {{ match.away }} {{ match.awayFlag }}
    </span>
        <span class="font-medium px-3 py-1 rounded-full text-sm" :class="match.selection ? 'bg-secondary text-secondary-foreground' : 'bg-gray-200 text-gray-500'">
      {{ formatPrediction(match) }}
    </span>
    </li>
</template>

<script setup>
const props = defineProps({
    match: {
        type: Object,
        required: true
    }
});

const formatPrediction = (match) => {
    if (!match.selection) return 'Sin selección';
    if (match.selection === 'X') return `Empate ${match.drawScore}-${match.drawScore}`;
    return `${match.homeScore} - ${match.awayScore}`;
};
</script>

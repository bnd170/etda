<template>
    <div class="rounded-lg shadow-lg overflow-hidden bg-white">
        <div class="bg-slate-950 p-3 text-center">
            <span class="text-sm font-medium text-primary-foreground">{{ match.stage }}</span>
            <p class="text-xs text-primary-foreground/80 mt-1">{{ formatDate(match.date) }}</p>
        </div>
        <div class="flex items-center justify-around mb-4 bg-neutral-200">
            <div class="flex flex-col items-center flex-1 justify-center">
                <img :src="getFlagUrl(match.homeIso)" :alt="match.home + ' flag'" class="w-75 h-25 object-cover">
                <span class="font-semibold text-gray-800 border-b-2 border-primary">{{ match.home }}</span>
            </div>
            <div class="font-bold text-xl text-gray-900 mx-2">VS</div>
            <div class="flex flex-col items-center flex-1 justify-center">
                <img :src="getFlagUrl(match.awayIso)" :alt="match.away + ' flag'" class="w-75 h-25 object-cover">
                <span class="font-semibold text-gray-800 border-b-2 border-primary">{{ match.away }}</span>
            </div>
        </div>
        <div class="flex flex-col justify-around items-center py-2 bg-neutral-50">
            <p class="mb-2 text-black">
                ☝🏼. Predice el <b>resultado</b> del encuentro
            </p>
            <section class="flex justify-around w-2/5">
                <button
                    @click="selectResult('1')"
                    :class="[
            'w-8 h-8 rounded-full font-medium transition-colors text-sm',
            match.selection === '1'
              ? 'bg-gray-400'
              : 'bg-gray-200 text-gray-700 hover:bg-gray-700'
          ]"
                >
                    1
                </button>
                <button
                    @click="selectResult('X')"
                    :class="[
            'w-8 h-8 rounded-full font-medium transition-colors text-sm',
            match.selection === 'X'
              ? 'bg-gray-400'
              : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
          ]"
                >
                    X
                </button>
                <button
                    @click="selectResult('2')"
                    :class="[
            'w-8 h-8 rounded-full font-medium transition-colors text-sm',
            match.selection === '2'
              ? 'bg-gray-400'
              : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
          ]"
                >
                    2
                </button>
            </section>
        </div>
        <div class="flex flex-col justify-around items-center py-2 bg-neutral-50">
            <p class="mb-2 text-black">
                ✌🏼. Predice el <b>marcador</b> del encuentro
            </p>
            <div v-if="match.selection === 'X'" class="flex justify-center mb-4">
                <div class="bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold">
                    <input
                        type="number"
                        v-model="drawScore"
                        placeholder="-"
                        class="w-16 bg-transparent text-center"
                        min="0"
                        max="99"
                    >
                </div>
            </div>
            <div v-else class="flex justify-center space-x-4 mb-4">
                <input
                    type="number"
                    v-model="homeScore"
                    placeholder="-"
                    class="w-16 bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold text-center"
                    min="0"
                    max="99"
                >
                <input
                    type="number"
                    v-model="awayScore"
                    placeholder="-"
                    class="w-16 text-center bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold"
                    min="0"
                    max="99"
                >
            </div>
            <p v-if="error" class="text-red-500 text-sm text-center">{{ error }}</p>
        </div>
    </div>
</template>

<script setup>
import {ref, watch} from 'vue';

const props = defineProps({
    match: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update:match']);

const homeScore = ref(props.match.homeScore);
const awayScore = ref(props.match.awayScore);
const drawScore = ref(props.match.drawScore);
const error = ref(props.match.error);

watch([homeScore, awayScore, drawScore], () => {
    updateSelection();
    emitUpdatedMatch();
});

const getFlagUrl = (isoCode) => {
    return `https://flagsapi.com/${isoCode.toUpperCase()}/flat/64.png`;
};

const selectResult = (option) => {
    props.match.selection = option;
    if (option === '1') {
        drawScore.value = null;
        awayScore.value = null;
    } else if (option === '2') {
        drawScore.value = null;
        homeScore.value = null;
    } else if (option === 'X') {
        homeScore.value = null;
        awayScore.value = null;
    }
    emitUpdatedMatch();
};

const updateSelection = () => {
    if (homeScore.value !== null && awayScore.value !== null) {
        if (homeScore.value > awayScore.value) {
            props.match.selection = '1';
        } else if (awayScore.value > homeScore.value) {
            props.match.selection = '2';
        } else {
            props.match.selection = 'X';
        }
    }
};

const emitUpdatedMatch = () => {
    emit('update:match', {
        ...props.match,
        homeScore: homeScore.value,
        awayScore: awayScore.value,
        drawScore: drawScore.value,
        error: error.value
    });
};

const formatDate = (date) => {
    return new Intl.DateTimeFormat('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    }).format(date);
};
</script>

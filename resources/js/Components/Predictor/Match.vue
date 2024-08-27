<template>
    <div class="rounded-lg shadow-lg overflow-hidden bg-white">
        <div class="bg-slate-950 p-3 text-center">
            <span class="text-sm font-medium text-primary-foreground">{{ match.stage }}</span>
            <p class="text-xs text-primary-foreground/80 mt-1">{{ formatDate(match.date) }}</p>
        </div>
        <div class="p-4">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center flex-1 justify-center">
                    <img :src="getFlagUrl(match.homeIso)" :alt="match.home + ' flag'" class="w-8 h-6 mr-2 object-cover">
                    <span class="font-semibold text-gray-800 border-b-2 border-primary">{{ match.home }}</span>
                </div>
                <div class="font-bold text-xl text-gray-900 mx-2">VS</div>
                <div class="flex items-center flex-1 justify-center">
                    <span class="font-semibold text-gray-800 border-b-2 border-primary">{{ match.away }}</span>
                    <img :src="getFlagUrl(match.awayIso)" :alt="match.away + ' flag'" class="w-8 h-6 ml-2 object-cover">
                </div>
            </div>
            <div class="flex justify-between items-center mb-4">
                <button
                    @click="selectResult('1')"
                    :class="[
            'w-20 h-10 rounded-full font-medium transition-colors text-sm',
            match.selection === '1'
              ? 'bg-secondary text-secondary-foreground shadow-md'
              : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
          ]"
                >
                    1
                </button>
                <button
                    @click="selectResult('X')"
                    :class="[
            'w-20 h-10 rounded-full font-medium transition-colors text-sm',
            match.selection === 'X'
              ? 'bg-secondary text-secondary-foreground shadow-md'
              : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
          ]"
                >
                    X
                </button>
                <button
                    @click="selectResult('2')"
                    :class="[
            'w-20 h-10 rounded-full font-medium transition-colors text-sm',
            match.selection === '2'
              ? 'bg-secondary text-secondary-foreground shadow-md'
              : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
          ]"
                >
                    2
                </button>
            </div>
            <div v-if="match.selection === 'X'" class="flex justify-center mb-4">
                <div class="bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold">
                    <input
                        type="number"
                        v-model="drawScore"
                        placeholder="0"
                        class="w-12 bg-transparent text-center"
                        min="0"
                        max="99"
                        @input="validateScore"
                    >
                </div>
            </div>
            <div v-else class="flex justify-center space-x-4 mb-4">
                <div class="bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold">
                    <input
                        type="number"
                        v-model="homeScore"
                        placeholder="0"
                        class="w-12 bg-transparent text-center"
                        min="0"
                        max="99"
                        @input="validateScore"
                    >
                </div>
                <div class="bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold">
                    <input
                        type="number"
                        v-model="awayScore"
                        placeholder="0"
                        class="w-12 bg-transparent text-center"
                        min="0"
                        max="99"
                        @input="validateScore"
                    >
                </div>
            </div>
            <p v-if="error" class="text-red-500 text-sm text-center">{{ error }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

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
    validateScore();
});

const getFlagUrl = (isoCode) => {
    return `https://www.worldometers.info/img/flags/${isoCode.toLowerCase()}-flag.gif`;
};

const selectResult = (option) => {
    const updatedMatch = { ...props.match, selection: option };
    if (option !== 'X') {
        updatedMatch.drawScore = null;
    } else {
        updatedMatch.homeScore = null;
        updatedMatch.awayScore = null;
    }
    emit('update:match', updatedMatch);
    validateScore();
};

const validateScore = () => {
    error.value = null;
    let updatedMatch = { ...props.match };

    if (props.match.selection === 'X') {
        if (drawScore.value === null || drawScore.value === '') {
            error.value = 'Por favor, introduce un resultado para el empate';
        } else {
            updatedMatch.drawScore = drawScore.value;
        }
    } else {
        if (homeScore.value === null || homeScore.value === '' || awayScore.value === null || awayScore.value === '') {
            error.value = 'Por favor, introduce un resultado para ambos equipos';
        } else if (props.match.selection === '1' && parseInt(homeScore.value) <= parseInt(awayScore.value)) {
            error.value = 'El equipo local debe ganar si seleccionaste "1"';
        } else if (props.match.selection === '2' && parseInt(awayScore.value) <= parseInt(homeScore.value)) {
            error.value = 'El equipo visitante debe ganar si seleccionaste "2"';
        } else {
            updatedMatch.homeScore = homeScore.value;
            updatedMatch.awayScore = awayScore.value;
        }
    }

    updatedMatch.error = error.value;
    emit('update:match', updatedMatch);
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

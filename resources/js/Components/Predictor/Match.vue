<template>
    <Card class="card-match">
        <template #content>
            <div class="bg-slate-950 p-3 text-center">
                <span class="text-sm font-medium text-primary-foreground">{{ match.stage }}</span>
                <p class="text-xs text-primary-foreground/80 mt-1">{{ formatDate(match.date) }}</p>
            </div>
            <div class="flex items-center justify-around py-5 ">
                <div class="flex flex-col items-center flex-1 justify-center">
                    <img :src="getFlagUrl(match.homeIso)" :alt="match.home + ' flag'" class="w-75 h-25 object-cover">
                    <span class="font-semibold">{{ match.home }}</span>
                </div>
                <div class="font-bold text-xl  mx-2">VS</div>
                <div class="flex flex-col items-center flex-1 justify-center">
                    <img :src="getFlagUrl(match.awayIso)" :alt="match.away + ' flag'" class="w-75 h-25 object-cover">
                    <span class="font-semibold">{{ match.away }}</span>
                </div>
            </div>
            <div class="flex flex-col justify-around items-center py-5 bg-black/25">
                <p class="mb-2">
                    ☝🏼. Predice el <b>resultado</b> del encuentro
                </p>

                <section class="card flex justify-center">
                    <ButtonGroup>
                    <Button rounded severity="secondary" label="1" @click="selectResult('1')" :disabled="match.selection === '1'" />
                    <Button rounded severity="secondary" label="X" @click="selectResult('X')" :disabled="match.selection === 'X'" />
                    <Button rounded severity="secondary" label="2" @click="selectResult('2')" :disabled="match.selection === '2'" />
                        </ButtonGroup>
                </section>
            </div>
            <div class="flex flex-col justify-around items-center py-5 bg-black/55">
                <p class="mb-2">
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
        </template>
    </Card>
</template>

<script setup>
import {ref, watch} from 'vue';
import { getFlagUrl } from '~/Utils/flags.js';
import Card from 'primevue/card';
import Button from 'primevue/button';
import ButtonGroup from 'primevue/buttongroup';

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

<style>
.card-match {
    @apply overflow-hidden;
}

.card-match .card-body {
    @apply p-0;
}

.card-match .card-content {
    @apply p-0;
}
</style>

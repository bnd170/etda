<template>
    <section class="max-w-6xl mx-auto p-4">
        <header class="mb-10 mt-5">
            <h1 class="text-3xl font-bold text-center">Porra de {{ tournament.name }}</h1>
            <p class="text-center text-lg text-gray-500">Haz tus predicciones para los partidos de {{ tournament.name }}</p>
        </header>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <Match
                v-for="(match, index) in matches"
                :key="index"
                :match="match"
                @update:match="updateMatch(index, $event)"
            />
        </div>
        <section>
            <Card class="w-full mt-10">
                <template #title>
                    <header>
                        <h3 class="box-title">Resumen de tu porra</h3>
                    </header>
                </template>
                <template #content>
                    <DataView :value="matches">
                        <template #list="slotProps">
                            <Summary
                                v-for="(match, index) in slotProps.items"
                                :key="index"
                                :match="match"
                            />
                        </template>
                    </DataView>
                    <div class="mt-8 text-center">
                        <Button label="Guardar predicciones" outlined @click="submitBet" :disabled="!bettingComplete"/>
                    </div>
                </template>
            </Card>
        </section>
    </section>
</template>

<script setup>
import {computed, ref} from 'vue';
import Match           from '~/Components/Predictor/Match.vue';
import Summary         from '~/Components/Predictor/Summary.vue';
import Card            from "primevue/card";
import DataView        from 'primevue/dataview';
import Button          from 'primevue/button';
import Default         from "~/Layout/Default.vue";

defineOptions({layout: Default})

const props = defineProps({
    tournament: {
        type: Object,
        required: true
    },
    games: {
        type: Array,
        required: true
    }
});


const matches = ref(props.games.map(game => {
    return {
            home: game.team_home.name,
            away: game.team_away.name,
            homeIso: game.team_home.iso,
            awayIso: game.team_away.iso,
            date: new Date(game.date),
            stage: game.round,
            selection: null,
            homeScore: null,
            awayScore: null,
            drawScore: null,
            error: null
        }
}));

const updateMatch = (index, updatedMatch) => {
    matches.value[index] = {...matches.value[index], ...updatedMatch};
};

const bettingComplete = computed(() => {
    return matches.value.every(match =>
        match.selection &&
        ((match.selection==='X' && match.drawScore!==null) ||
            (match.selection!=='X' && match.homeScore!==null && match.awayScore!==null)) &&
        !match.error
    );
});

const submitBet = () => {
    if (bettingComplete.value) {
        // Aquí iría la lógica para enviar la porra al backend
        alert('¡Porra enviada con éxito!');
    } else {
        alert('Por favor, completa todos los partidos y predicciones correctamente antes de enviar la porra.');
    }
};
</script>

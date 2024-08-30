<template>
    <div class="max-w-6xl mx-auto p-4 ">
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
    </div>
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

const matches = ref([
    {
        home: 'España',
        away: 'Alemania',
        homeIso: 'ES',
        awayIso: 'DE',
        date: new Date('2023-06-15T20:00:00'),
        stage: 'Fase de Grupos',
        selection: null,
        homeScore: null,
        awayScore: null,
        drawScore: null,
        error: null
    },
    {
        home: 'Brasil',
        away: 'Argentina',
        homeIso: 'BR',
        awayIso: 'AR',
        date: new Date('2023-06-16T20:00:00'),
        stage: 'Cuartos de Final',
        selection: null,
        homeScore: null,
        awayScore: null,
        drawScore: null,
        error: null
    },
    {
        home: 'Francia',
        away: 'Inglaterra',
        homeIso: 'FR',
        awayIso: 'GB',
        date: new Date('2023-06-17T20:00:00'),
        stage: 'Semifinal',
        selection: null,
        homeScore: null,
        awayScore: null,
        drawScore: null,
        error: null
    },
    {
        home: 'Italia',
        away: 'Portugal',
        homeIso: 'IT',
        awayIso: 'PT',
        date: new Date('2023-06-18T20:00:00'),
        stage: 'Fase de Grupos',
        selection: null,
        homeScore: null,
        awayScore: null,
        drawScore: null,
        error: null
    },
    {
        home: 'Holanda',
        away: 'Bélgica',
        homeIso: 'NL',
        awayIso: 'BE',
        date: new Date('2023-06-19T20:00:00'),
        stage: 'Octavos de Final',
        selection: null,
        homeScore: null,
        awayScore: null,
        drawScore: null,
        error: null
    },
    {
        home: 'Uruguay',
        away: 'Colombia',
        homeIso: 'UY',
        awayIso: 'CO',
        date: new Date('2023-06-20T20:00:00'),
        stage: 'Fase de Grupos',
        selection: null,
        homeScore: null,
        awayScore: null,
        drawScore: null,
        error: null
    },
]);

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

<template>
    <Toast />
    <section class="max-w-6xl mx-auto p-4">
        <header class="mb-10 mt-5" @click="show">
            <h1 class="text-3xl font-bold text-center">Porra de {{ tournament.name }}</h1>
            <p class="text-center text-lg text-gray-500">Haz tus predicciones para los partidos de {{
                    tournament.name
                }}</p>
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
                </template>
            </Card>
        </section>
    </section>
</template>

<script setup>
import {ref}    from 'vue';
import Match    from '~/Components/Predictor/Match.vue';
import Summary  from '~/Components/Predictor/Summary.vue';
import Card     from "primevue/card";
import DataView from 'primevue/dataview';
import Default   from "~/Layout/Default.vue";
import {useForm} from "@inertiajs/vue3";
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";

defineOptions({layout: Default})

const toast = useToast();
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
        predictor_game_id: game.id,
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

const form = useForm({
    matches: matches.value
});

const updateMatch = (index, updatedMatch) => {
    form.matches[index] = {...form.matches[index], ...updatedMatch};
    const currentMatch = form.matches[index];
    if (currentMatch.selection!==null && (currentMatch.drawScore!==null || (currentMatch.homeScore!==null && currentMatch.awayScore!==null))) {
        form.transform(() => {
            const awayScore = currentMatch.selection==='X' ? currentMatch.drawScore:currentMatch.awayScore;
            const homeScore = currentMatch.selection==='X' ? currentMatch.drawScore:currentMatch.homeScore;
            return {
                predictor_game_id: currentMatch.predictor_game_id,
                score_home: homeScore,
                score_away: awayScore,
                selection: currentMatch.selection
            }
        }).post(route('predictions.save', {slug: props.tournament.slug}), {
            preserveScroll: true,
            onSuccess: () => {
                toast.add({ severity: 'success', summary: 'Predicción realizada', detail: 'Hemos guardado tu predicción. ¡Mucha suerte!', life: 3000 });
            }
        });
    }
};
</script>

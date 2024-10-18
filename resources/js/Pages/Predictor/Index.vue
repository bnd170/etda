<template>
    <Head>
        <title>La Quini de {{ tournament.name }}</title>
    </Head>
    <Toast/>
    <PredictorHeader :tournament="tournament"/>
    <section class="container mx-auto">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <Match
                v-for="(match, index) in matches"
                :key="index"
                :match="match"
                @update:match="updateMatch(index, $event)"
            />
        </div>
    </section>
</template>

<script setup>
import Default          from "~/Layout/Default.vue";
import Match            from '~/Components/Predictor/Match.vue';
import {matchProccesor} from "@/Utils/matches.js";
import PredictorHeader  from "@/Components/Predictor/PredictorHeader.vue";
import {ref}            from 'vue';
import {useForm}        from "@inertiajs/vue3";
import Toast            from 'primevue/toast';
import {useToast}       from "primevue/usetoast";
import {Head}           from '@inertiajs/vue3'

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

const matches = ref(props.games.map(matchProccesor));

const form = useForm({
    matches: matches.value
});

const updateMatch = (index, updatedMatch) => {
    form.matches[index] = {...form.matches[index], ...updatedMatch};
    const currentMatch = form.matches[index];

    if (!isPredictionFullFilled(currentMatch)) {
        return;
    }

    form.transform(() => transformMatch(currentMatch))
        .post(route('predictor.prediction.save', {slug: props.tournament.slug}), {
            preserveScroll: true,
            onSuccess: () => showSuccessMessage(),
        });

};
const isPredictionFullFilled = (currentMatch) => {
    return currentMatch.selection!==null || (currentMatch.drawScore!==null && (currentMatch.homeScore!==null || currentMatch.awayScore!==null));
};
const showSuccessMessage = () => {
    toast.add({
        severity: 'success',
        summary: 'Predicción realizada',
        detail: 'Hemos guardado tu predicción. ¡Mucha suerte!',
        life: 3000
    });
};

const transformMatch = (currentMatch) => {
    const awayScore = currentMatch.selection==='X' ? currentMatch.drawScore:currentMatch.awayScore;
    const homeScore = currentMatch.selection==='X' ? currentMatch.drawScore:currentMatch.homeScore;
    return {
        predictor_game_id: currentMatch.predictor_game_id,
        home_score: homeScore,
        away_score: awayScore,
        selection: currentMatch.selection
    };
}
</script>

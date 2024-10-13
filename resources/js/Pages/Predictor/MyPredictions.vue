<template>
    <PredictorHeader :tournament="tournament"/>
    <section>
        <Card class="container mx-auto">
            <template #title>
                <header>
                    <h3 class="box-title">Tus predicciones</h3>
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
</template>

<script setup>
import {ref}            from 'vue';
import Default          from "~/Layout/Default.vue";
import Summary          from '~/Components/Predictor/Summary.vue';
import SubMenu          from '~/Components/Predictor/SubMenu.vue';
import Card             from "primevue/card";
import DataView         from 'primevue/dataview';
import {matchProccesor} from "@/Utils/matches.js";
import PredictorHeader  from "@/Components/Predictor/PredictorHeader.vue";

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

const matches = ref(props.games.map(matchProccesor));
</script>

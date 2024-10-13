<template>
    <PredictorHeader :tournament="tournament"/>
    <section>
        <Card class="container mx-auto">
            <template #title>
                <h3 class="box-title">Clasificación</h3>
            </template>
            <template #content>
                <ul>
                    <li v-for="(ranking, index) in rankings" :key="ranking.id"
                        class="p-4 flex items-center justify-between border-b border-gray-600"
                        :class="{'bg-white/10': isLoggedUser(ranking.user.id)}">

                        <div class="flex items-center space-x-4">
                            <span
                                :class="[
                                'flex items-center justify-center w-8 h-8 rounded-full font-bold pt-1',
                                index === 0 ? 'bg-yellow-400 text-yellow-800' : 'bg-gray-200/60 text-black'
                              ]"
                            >
                              {{ index + 1 }}
                            </span>
                            <RankingPositionChangeIndicator :currentPosition="ranking.position"
                                                            :lastPosition="ranking.last_position"/>
                            <div>
                                <h2 class="font-semibold text-xl mb-1">
                                    {{ ranking.user.name }}
                                    <i v-if="index === 0" class="pi pi-star-fill text-yellow-400"/>
                                </h2>
                            </div>
                        </div>

                        <p class="text-sm">
                            {{ ranking.points }} pts
                            <RankingPointsChangeIndicator :currentPoints="ranking.points"
                                                          :lastPoints="ranking.last_points"/>
                        </p>
                    </li>
                </ul>
            </template>
        </Card>
    </section>
</template>

<script setup>
import Default                        from "~/Layout/Default.vue";
import PredictorHeader                from "@/Components/Predictor/PredictorHeader.vue";
import RankingPositionChangeIndicator from '~/Components/Predictor/RankingPositionChangeIndicator.vue';
import RankingPointsChangeIndicator   from '~/Components/Predictor/RankingPointsChangeIndicator.vue';
import Card                           from "primevue/card";
import {useToast}                     from "primevue/usetoast";
import { usePage }                    from '@inertiajs/vue3';

defineOptions({layout: Default})
const page = usePage();

const toast = useToast();
const props = defineProps({
    tournament: {
        type: Object,
        required: true
    },
    rankings: {
        type: Array,
        required: true
    }
});

const isLoggedUser = (userId) => {
    return userId === page.props.auth?.user.id;
}
</script>

<script setup>
import TopStats from "~/Components/Team/TopStats.vue";
import Default  from "~/Layout/Default.vue";
import {Head}   from "@inertiajs/vue3";
import Header   from "~/Components/League/Header.vue";
import Card     from 'primevue/card';


defineProps({
    stats: {
        type: Array,
        required: true
    },
    top_stats: {
        type: Array,
        required: true
    }
})

defineOptions({layout: Default})
</script>

<template>
    <Head>
        <title>Estadísticas - Liga nacional de fútbol 7 PC/DCA</title>
    </Head>
    <div class="container mx-auto">
        <Header/>
        <Card>
            <template #title>
                <div class="box-title">TOP ESTADISTICAS</div>
            </template>
            <template #content>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!--                <TopStats stat_name="Posesión" :top_stat="top_stats.possession" is_percentage/>-->
                    <TopStats stat_name="Goles" :top_stat="top_stats.goals"/>
                    <TopStats stat_name="Disparos" :top_stat="top_stats.shoots"/>
                    <TopStats stat_name="Efectividad" :top_stat="top_stats.proratedEffectivity" is_percentage/>
                    <TopStats stat_name="Pases" :top_stat="top_stats.passes"/>
                    <TopStats stat_name="Robos" :top_stat="top_stats.steals"/>
                    <TopStats stat_name="Faltas cometidas" :top_stat="top_stats.fouls"/>
                    <TopStats stat_name="Corners" :top_stat="top_stats.corners"/>
                    <TopStats stat_name="Penaltis" :top_stat="top_stats.penalties"/>
                    <TopStats stat_name="T. amarillas" :top_stat="top_stats.yellowCards"/>
                    <TopStats stat_name="T. rojas" :top_stat="top_stats.redCards"/>
                </div>
            </template>
        </Card>
    </div>
</template>


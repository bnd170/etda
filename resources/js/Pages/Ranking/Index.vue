<script setup>
import Default  from "~/Layout/Default.vue";
import Spacer   from "~/Components/Layout/Spacer.vue";
import Table    from "~/Components/Ranking/Table.vue";
import NewsHome from "~/Components/News/Home.vue";
import TopStats from "~/Components/Team/TopStats.vue";

defineProps({
    season: {
        type: Object,
        required: true
    },
    ranking: {
        type: Array,
        required: true
    },
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
    <div class="container mx-auto">
        <Spacer/>
        <div class="box">
            <div class="box-title">CLASIFICACIÓN</div>
            <Table :ranking="ranking"/>
        </div>

        <Spacer/>
        <div class="box">
            <div class="box-title">TOP ESTADISTICAS</div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <TopStats stat_name="Posesión" :top_stat="top_stats.possession" is_percentage/>
                <TopStats stat_name="Goles" :top_stat="top_stats.goals"/>
                <TopStats stat_name="Disparos" :top_stat="top_stats.shoots"/>
                <TopStats stat_name="Efectividad" :top_stat="top_stats.effectivity"/>
                <TopStats stat_name="Pases" :top_stat="top_stats.passes"/>
                <TopStats stat_name="Robos" :top_stat="top_stats.steals"/>
                <TopStats stat_name="Faltas cometidas" :top_stat="top_stats.fouls"/>
                <TopStats stat_name="Corners" :top_stat="top_stats.corners"/>
                <TopStats stat_name="Penaltis" :top_stat="top_stats.penalties"/>
                <TopStats stat_name="T. amarillas" :top_stat="top_stats.yellowCards"/>
                <TopStats stat_name="T. rojas" :top_stat="top_stats.redCards"/>
            </div>
        </div>

        <Spacer/>
        <div class="box">
            <div class="box-title">ACTUALIDAD</div>
            <div class="grid md:grid-cols-2 gap-10">
                <NewsHome/>
            </div>
        </div>
    </div>
</template>

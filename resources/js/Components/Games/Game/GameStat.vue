<script setup>
import {statPercent} from "~/Utils/numbers.js";

const props = defineProps({
    game: {
        type: Object,
        required: true
    },
    colors: {
        type: Object,
        required: true
    },
    statName: {
        type: String,
        required: true
    }
})

const statTitle = {
    possession: "% Posesión",
    shoots: "Disparos",
    effectivity: "Efectividad",
    passes: "Pases",
    steals: "Robos",
    fouls: "Faltas",
    corners: "Corners",
    yellowCards: "T. amarillas",
    redCards: "T. rojas",
    penalties: "Penaltis",
}

function defineMaxStat() {
    return props.game.stats.home[props.statName] + props.game.stats.away[props.statName];
}

const statMax = {
    possession: 100,
    shoots: defineMaxStat(),
    effectivity: 100,
    passes: defineMaxStat(),
    steals: defineMaxStat(),
    fouls: defineMaxStat(),
    corners: defineMaxStat(),
    yellowCards: defineMaxStat(),
    redCards: defineMaxStat(),
    penalties: defineMaxStat(),
}

</script>

<template>
    <div class="match-stats__row flex">
        <div class="w-4/12 text-right mr-10 text-xl">{{ statTitle[statName] }}</div>
        <div class="w-4/12 text-lg text-center relative">
            {{ game.stats.home[statName] }}
            <div class="absolute w-full bg-neutral-100/80 h-1">
                <div :style="`background: ${colors[game.home_team.sheet_name].start}; width: ${statPercent(game.stats.home[statName], statMax[statName])}%`" class="h-1 absolute right-0"></div>
            </div>
        </div>
        <div class="w-4/12 font-bold text-lg text-center relative">
            {{ game.stats.away[statName] }}
            <div class="absolute w-full bg-neutral-100/80 h-1">
                <div :style="`background: ${colors[game.away_team.sheet_name].start}; width: ${statPercent(game.stats.away[statName], statMax[statName])}%`" class="h-1"></div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

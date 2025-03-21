<script setup>
import Default    from "~/Layout/Default.vue";
import GameInfo   from "~/Components/Games/Game/GameInfo.vue";
import GameTeam   from "~/Components/Games/Game/GameTeam.vue";
import GameScore  from "~/Components/Games/Game/GameScore.vue";
import GameStat   from "~/Components/Games/Game/GameStat.vue";
import TeamPlayer from "~/Components/Games/Game/TeamPlayer.vue";
import GameGoal   from "~/Components/Games/Game/GameGoal.vue";
import {Head}     from "@inertiajs/vue3";
import {ref}      from "vue";

defineOptions({layout: Default})

const props = defineProps({
    game: {
        type: Object,
        required: true
    },
});

const statsLoaded = ref(props.game.stats['home'].passes!==0);
</script>

<template>
    <Head>
        <title>{{ game.home_team.name }} vs {{ game.away_team.name }} - J{{ game.round }} - LNF7PC</title>
    </Head>
    <div class="container mx-auto">
        <div class="flex flex-col w-full mt-16">
            <div class="match-summary">
                <GameInfo :game="game" start/>
                <div class="match-summary__teams_container">
                    <GameTeam team_position="home" :score="game.home_team_score" :team="game.home_team"/>
                    <GameScore :game="game"/>
                    <GameTeam team_position="away" :score="game.away_team_score" :team="game.away_team"/>
                </div>
                <GameInfo :game="game"/>


                <div class="match-summary__stats_container">
                    <div class="match-summary__stats--container-scorers">
                        <div class="w-5/12">
                            <GameGoal v-for="(goals, number) in game.stats.home.goals" :goals="goals"
                                      :player="game.home_team.players.find(p => p.number === parseInt(number))"/>
                        </div>
                        <div class="w-2/12"></div>
                        <div class="w-5/12">
                            <GameGoal v-for="(goals, number) in game.stats.away.goals" :goals="goals"
                                      :player="game.away_team.players.find(p => p.number === parseInt(number))"
                                      :is-home="false"/>
                        </div>
                    </div>
                    <!-- <GamePitch class="mt-10" :game="game" />-->
                    <div class="match-summary__stats--container-global" >
                        <div class="match-summary__stats--container-global__generic">
                            <h2 class="match-summary__title">ESTADISTICAS</h2>
                            <div class="flex flex-col gap-5 w-full px-5" v-if="statsLoaded">
                                <div class="match-stats__row flex">
                                    <div class="w-4/12"></div>
                                    <div class="w-4/12 font-bold text-lg text-center">
                                        <img :src="game.home_team.logo" :alt="game.home_team.name"
                                             class="w-8 mx-auto inline-block">
                                        {{ game.home_team.tag }}
                                    </div>
                                    <div class="w-4/12 font-bold text-lg text-center">
                                        <img :src="game.away_team.logo" :alt="game.away_team.name"
                                             class="w-8 mx-auto inline-block">
                                        {{ game.away_team.tag }}
                                    </div>
                                </div>
                                <!-- <GameStat :game="game" statName="possession"/>-->
                                <GameStat :game="game" statName="shoots"/>
                                <GameStat :game="game" statName="effectivity" is-percent/>
                                <GameStat :game="game" statName="passes"/>
                                <GameStat :game="game" statName="steals"/>
                                <GameStat :game="game" statName="fouls"/>
                                <GameStat :game="game" statName="corners"/>
                                <GameStat :game="game" statName="yellowCards"/>
                                <GameStat :game="game" statName="redCards"/>
                                <GameStat :game="game" statName="penalties"/>
                            </div>
                            <div class="flex flex-col gap-5 w-full px-5" v-else>
                                <h2 class="text-center text-xl text-gray-400">Estamos procesando los datos...</h2>
                            </div>
                        </div>
                    </div>
                    <div class="match-summary__stats--container-global">
                        <div class="match-summary__stats--container-global__players">
                            <h2 class="match-summary__title">PLANTILLA</h2>
                            <div class="w-full font-bold text-lg text-center pb-5">
                                <img :src="game.home_team.logo" :alt="game.home_team.name"
                                     class="w-16 mx-auto inline-block">
                                {{ game.home_team.name }}
                            </div>
                            <TeamPlayer :player="player" v-for="player in game.home_team.players" :key="player.id"/>
                        </div>
                        <div class="match-summary__stats--container-global__players">
                            <h2 class="match-summary__title">PLANTILLA</h2>
                            <div class="w-full font-bold text-lg text-center pb-5">
                                <img :src="game.away_team.logo" :alt="game.away_team.name"
                                     class="w-16 mx-auto inline-block">
                                {{ game.away_team.name }}
                            </div>

                            <TeamPlayer :player="player" v-for="player in game.away_team.players" :key="player.id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.match-summary {
    @apply flex flex-col w-full;
}

.match-summary .match-summary__teams_container {
    @apply flex flex-col md:flex-row w-10/12 mx-auto relative items-start z-10 h-48 md:h-20;
}

.match-summary .match-summary__stats_container {
    @apply flex flex-col w-full md:w-9/12 md:mx-auto relative;
}

.match-summary .match-summary__stats--container-scorers {
    @apply w-full flex flex-row items-start bg-white pb-5 pt-20 -mt-14 z-0 rounded-b-3xl dark:bg-surface-900 dark:text-surface-0;
}

.match-summary__stats--container-global {
    @apply mt-10 flex flex-col lg:flex-row gap-10;
}

.match-summary__stats--container-global__players {
    @apply flex flex-col w-full lg:w-3/6 bg-white py-10 px-5 rounded-2xl dark:bg-surface-900 dark:text-surface-0;
}

.match-summary__stats--container-global__generic {
    @apply flex bg-white rounded-2xl flex-col w-full py-10 px-5 dark:bg-surface-900 dark:text-surface-0;
}

.match-summary__title {
    @apply text-2xl font-bold text-center mb-8;
}

.match-player {
    @apply text-lg my-1.5 flex flex-row justify-between;
}

</style>

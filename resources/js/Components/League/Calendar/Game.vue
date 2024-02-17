<script setup>
import GameTeam from "~/Components/League/Calendar/GameTeam.vue";
import Button   from "primevue/button";

defineProps({
    game: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <a :href="route('national-league.game', {'slug': game.slug})">
        <div
            class="flex flex-col lg:flex-row gap-3 lg:gap-10 border-b border-surface-800 dark:border-surface-950/50 py-2">
            <div class="w-full xl:w-8/12 flex flex-row">
                <div class="w-4/12 lg:w-5/12 flex items-center justify-end space-x-2">
                    <GameTeam is-home :team="game.home_team"/>
                </div>
                <div class="w-4/12 lg:w-2/12">
                    <div
                        class="w-[3.4rem] mx-auto font-bold dark:bg-surface-950 rounded-lg py-1 bg-surface-200/70 flex flex-row justify-center">
                        {{ game.home_team_score }} - {{ game.away_team_score }}
                    </div>
                </div>
                <div class="w-4/12 lg:w-5/12 flex items-center justify-start">
                    <GameTeam :team="game.away_team"/>
                </div>
            </div>
            <div class="w-full xl:w-3/12 flex-row items-center justify-end hidden lg:flex">
                <div class="capitalize items-center gap-1 hidden md:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                              d="M512 512a192 192 0 1 0 0-384 192 192 0 0 0 0 384zm0 64a256 256 0 1 1 0-512 256 256 0 0 1 0 512z"/>
                        <path fill="currentColor"
                              d="M512 512a32 32 0 0 1 32 32v256a32 32 0 1 1-64 0V544a32 32 0 0 1 32-32z"/>
                        <path fill="currentColor"
                              d="M384 649.088v64.96C269.76 732.352 192 771.904 192 800c0 37.696 139.904 96 320 96s320-58.304 320-96c0-28.16-77.76-67.648-192-85.952v-64.96C789.12 671.04 896 730.368 896 800c0 88.32-171.904 160-384 160s-384-71.68-384-160c0-69.696 106.88-128.96 256-150.912z"/>
                    </svg>
                    {{ game.location }}, {{ game.state }}
                </div>
            </div>
            <div class="w-full xl:w-1/12 flex flex-row items-center justify-center lg:justify-end mt-3 lg:mt-0">
                <Button label="Ver ficha" size="small" severity="secondary"/>
            </div>
        </div>
    </a>
</template>

<style scoped>

</style>

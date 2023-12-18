<script setup>
defineProps({
    game: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="match-summary__score_container">
        <div class="score">{{ game.home_team_score }} <span>-</span> {{ game.away_team_score }}</div>
    </div>
</template>

<style scoped>
.match-summary__score_container {
    @apply flex flex-col items-center justify-center w-2/12 bg-neutral-950 text-white py-1.5;
}
.match-summary__score_container .score {
    @apply text-6xl font-bold font-['Urbanist'];
}
</style>

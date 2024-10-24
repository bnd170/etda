<template>
    <section class="flex flex-col grow ">
        <div class="flex flex-col grow items-center justify-center dark:bg-slate-950/80 bg-stone-200/50">
            <h2 class="text-sm">Finalizado</h2>
            <h3 class="text-lg">Resultado final</h3>
            <div class="flex flex-row w-full pt-5">
                <div class="match-score-final">
                    {{ match.game_info.homeScore}}
                </div>
                <div class="match-score-final">
                    {{ match.game_info.awayScore}}
                </div>
            </div>
        </div>
        <div v-if="match.points" class="py-5 dark:bg-slate-900 bg-stone-200 flex flex-col items-center justify-center">
            <h3 class="text-lg">Tu puntuación</h3>
            <h4 class="font-extrabold text-2xl" :class="{
                'text-green-500': match.points > 0,
                'text-red-500': match.points < 0
            }">{{ match.points }} puntos</h4>
        </div>
    </section>
</template>

<script setup>

defineProps({
    match: {
        type: Object,
        required: true
    }
});
</script>

<style scoped>
.match-score-final {
    @apply w-1/2 text-5xl font-extrabold font-[Cabin] text-center;
}
</style>

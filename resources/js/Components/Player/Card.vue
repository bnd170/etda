<template>
    <div class="card flex flex-row h-[17rem] dark:bg-surface-800/70 bg-surface-50 transition-colors">
        <img class="w-2/5 object-cover rounded-l-2xl"
             :src="player.image || '/img/player.webp'" :alt="player.name">
        <section class="w-3/5">
            <div class="flex p-4 flex-col">
                <div class="text-center mt-2 text-3xl font-medium">{{ player.name }}<br>{{ player.surname }}</div>
                <div class="text-center font-normal text-lg">{{ player.position }}</div>
            </div>
            <div class="flex w-full p-4">
                <div class="w-1/3 text-center">
                    <h3>Dorsal</h3>
                    <span class="font-bold text-xl">{{ player.number }}</span>
                </div>
                <div class="w-0 border border-base-300"></div>
                <div class="w-1/3 text-center">
                    <h3>Edad</h3>
                    <span class="font-bold text-xl">{{ player.age || '?' }}</span>
                </div>
                <div class="w-0 border border-base-300"></div>
                <div class="w-1/3 text-center">
                    <h3>Clase</h3>
                    <span class="font-bold text-xl">{{ player.classification }}</span>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
defineProps({
    player: {
        type: Object,
        required: true
    },
})
</script>

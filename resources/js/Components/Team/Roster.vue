<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-10">
        <PlayerCard :player="player" v-for="player in players" />
    </div>
</template>

<script setup>
import PlayerCard from '~/Components/Player/Card.vue';

defineProps({
    players: {
        type: Array,
        required: true
    }
})

</script>

<template>
  <div class="match-player">
    <div>{{player.number}}. {{ name }} <b>{{ surname }}</b></div>
    <div>{{ classification }}</div>
  </div>
</template>
<script setup>
import {computed} from "vue";

const props = defineProps({
    player: {
        type: Object,
        required: true,
    },
});
const name = computed(() => props.player.name);
const surname = computed(() => props.player.surname.split(' ')[0]);
const classification = computed(() => props.player.classification);
</script>
<style scoped>

.match-player {
  @apply text-lg my-1.5 flex flex-row justify-between;
}

</style>

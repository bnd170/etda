<template>
  <span v-if="currentPoints !== null" :class="[getColor]">
    <span v-if="change !== 0">({{ symbol }}{{ Math.abs(change) }} pts)</span>
  </span>
</template>

<script setup>
import {computed} from 'vue';

const props = defineProps({
    currentPoints: {
        type: Number
    },
    lastPoints: {
        type: Number
    }
});

const change = computed(() => {
    if (props.lastPoints===null) return props.currentPoints;

    return props.currentPoints - props.lastPoints;
});

const getColor = computed(() => {
    if (change.value===0) return 'text-gray-500';
    return change.value > 0 ? 'text-green-500':'text-red-500';
});

const symbol = computed(() => {
    if (change.value === 0) return '';
    return change.value > 0 ? '+' : '-';
});
</script>

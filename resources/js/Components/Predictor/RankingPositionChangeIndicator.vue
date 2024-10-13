<template>
  <span v-if="currentPosition !== null"
        :class="['flex items-center', getColor]">
    <span class="flex space-x-1  items-start">
        <i class="pi" :class="getIcon" style="font-size: 1.3rem"></i>
        <span>{{ Math.abs(change) }}</span>
    </span>
  </span>
</template>

<script setup>
import {computed} from 'vue';
// import { ArrowUp, ArrowDown, Minus } from 'lucide-vue-next';

const props = defineProps({
    currentPosition: {
        type: Number
    },
    lastPosition: {
        type: Number
    }
});

const change = computed(() => {
    if (props.lastPosition===null) return 0;

    return props.lastPosition - props.currentPosition;
});

const getColor = computed(() => {
    if (change.value===0) return 'text-gray-500';
    return change.value > 0 ? 'text-green-500':'text-red-500';
});

const getIcon = computed(() => {
    if (change.value === 0) return 'pi-circle-fill';
    return change.value > 0 ? 'pi-sort-up' : 'pi-sort-down';
});
</script>

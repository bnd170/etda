<template>
  <div class="flex flex-col justify-around items-center py-5 dark:bg-slate-950/80 bg-stone-200/50">
    <p class="mb-2">
      ☝🏼. Predice el <b>resultado</b> del encuentro
    </p>

    <section class="card flex justify-center">
      <InputGroup>
        <Button rounded severity="secondary" label="1" @click="selectResult('1')"
                :disabled="match.selection === '1'"/>
        <Button rounded severity="secondary" label="X" @click="selectResult('X')"
                :disabled="match.selection === 'X'"/>
        <Button rounded severity="secondary" label="2" @click="selectResult('2')"
                :disabled="match.selection === '2'"/>
      </InputGroup>
    </section>
  </div>
  <div class="flex flex-col justify-around items-center py-5 dark:bg-slate-900 bg-stone-200">
    <p class="mb-2">
      <template v-if="match.selection === 'X'">
        <span>👇🏼. Predice el <b>a cuantos goles</b>  empatarán</span>
      </template>
      <template v-else>
        <span>👇🏼. Predice el <b>marcador</b> del encuentro</span>
      </template>
    </p>
    <div v-if="match.selection === 'X'" class="flex justify-center mb-4">
      <div class="dark:bg-gray-800 bg-gray-500 text-white px-4 py-2 rounded-lg text-2xl font-bold">
        <input
          type="number"
          v-model="drawScore"
          placeholder="-"
          class="w-16 bg-transparent text-center"
          min="0"
          max="99"
        >
      </div>
    </div>
    <div v-else class="flex justify-center space-x-4 mb-4">
      <input
        type="number"
        v-model="homeScore"
        placeholder="-"
        class="w-16 bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold text-center"
        min="0"
        max="99"
      >
      <input
        type="number"
        v-model="awayScore"
        placeholder="-"
        class="w-16 text-center bg-gray-800 text-white px-4 py-2 rounded-lg text-2xl font-bold"
        min="0"
        max="99"
      >
    </div>
    <p v-if="error" class="text-red-500 text-sm text-center">{{ error }}</p>
  </div>
</template>

<script setup>
import Button       from 'primevue/button';
import InputGroup   from 'primevue/inputgroup';
import {ref, watch} from "vue";

const props = defineProps({
  match: {
    type: Object,
    required: true
  }
});

const emit = defineEmits(['update:match']);

const homeScore = ref(props.match.homeScore);
const awayScore = ref(props.match.awayScore);
const drawScore = ref(props.match.drawScore);
const error = ref(props.match.error);

watch([homeScore, awayScore, drawScore], () => {
  updateSelection();
  emitUpdatedMatch();
});

const selectResult = (option) => {
  props.match.selection = option;
  if (option==='1') {
    drawScore.value = null;
    awayScore.value = null;
  } else if (option==='2') {
    drawScore.value = null;
    homeScore.value = null;
  } else if (option==='X') {
    homeScore.value = null;
    awayScore.value = null;
  }
  emitUpdatedMatch();
};

const updateSelection = () => {
  if (homeScore.value!==null && awayScore.value!==null) {
    if (homeScore.value > awayScore.value) {
      props.match.selection = '1';
    } else if (awayScore.value > homeScore.value) {
      props.match.selection = '2';
    } else {
      props.match.selection = 'X';
    }
  }
};

const emitUpdatedMatch = () => {
  emit('update:match', {
    ...props.match,
    homeScore: homeScore.value,
    awayScore: awayScore.value,
    drawScore: drawScore.value,
    error: error.value
  });
};

</script>

<style scoped>

</style>

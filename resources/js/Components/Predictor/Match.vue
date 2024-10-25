<template>
    <Card class="card-match" :pt="{
        body: (options => ({class: ['flex-grow', 'card-body']})),
        content: (options => ({class: ['flex-grow h-full flex flex-col', 'card-content']}))
    }">
        <template #content>
            <div class="dark:bg-slate-950 bg-stone-300/80 p-3 text-center">
                <span class="text-sm font-medium text-primary-foreground">{{ match.game_info.stage }}</span>
                <p class="text-xs text-primary-foreground/80 mt-1">{{ game_date }}</p>
            </div>
            <div
                class="flex items-center justify-around py-5 bg-gradient-to-r from-stone-50 to-zinc-200 dark:from-slate-900 dark:to-slate-700">
                <div class="flex flex-col items-center flex-1 justify-center">
                    <img :src="getFlagUrl(match.game_info.homeIso)" :alt="match.game_info.home + ' flag'" width="64"
                         class="aspect-[64/48] object-cover">
                    <span class="font-semibold mt-2">{{ match.game_info.home }}</span>
                </div>
                <div class="font-bold text-xl  mx-2">VS</div>
                <div class="flex flex-col items-center flex-1 justify-center">
                    <img :src="getFlagUrl(match.game_info.awayIso)" :alt="match.game_info.away + ' flag'" width="64"
                         class="aspect-[64/48] object-cover">
                    <span class="font-semibold mt-2">{{ match.game_info.away }}</span>
                </div>
            </div>
            <NotPlayedMatchControls v-if="!alreadyPlayed" :match="match" @update:match="emitUpdatedMatch($event)"/>
            <PlayedMatchControls v-else :match="match"/>
        </template>
    </Card>
</template>

<script setup>
import {getFlagUrl}           from '~/Utils/flags.js';
import Card                   from 'primevue/card';
import NotPlayedMatchControls from "@/Components/Predictor/Match/NotPlayedMatchControls.vue";
import PlayedMatchControls    from "@/Components/Predictor/Match/PlayedMatchControls.vue";
import {formatDate} from "~/Utils/date.js";

const props = defineProps({
    match: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update:match']);

const alreadyPlayed = props.match.game_info.status==='played';


const emitUpdatedMatch = (match) => {
    emit('update:match', match);
};
console.log(props.match);
const game_date = formatDate(props.match.game_info.date, {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
}).replace(/\//g, '.');
</script>

<style>
.card-match {
    @apply overflow-hidden border-2 dark:border-slate-600 flex flex-col;
}

.card-match .card-body {
    @apply p-0;
}

.card-match .card-content {
    @apply p-0;
}
</style>

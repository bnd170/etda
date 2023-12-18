<script setup>
import {computed}   from "vue";
import {formatDate} from "~/Utils/date.js";

const props = defineProps({
    game: {
        type: Object,
        required: true
    },
    start: {
        type: Boolean,
        required: false,
        default: false
    }
});

const day = computed(() => formatDate(props.game.date, {weekday: 'short'}));
const date = computed(() => formatDate(props.game.date, {day: '2-digit', month: 'short', year: 'numeric'}).replace(/\//g, '.'));
const hour = computed(() => formatDate(props.game.date, {hour: '2-digit', minute: '2-digit'}));
const status = computed(() => {
    console.log(props.game.status)
    switch (props.game.status) {
        case 'pending':
            return 'Pendiente';
        case 'finished':
            return 'Finalizado';
        case 'postponed':
            return 'Aplazado';
        case 'canceled':
            return 'Cancelado';
        default:
            return 'Desconocido';
    }
});
</script>

<template>
    <div class="match-summary__info-container">
        <div class="match-summary__info" v-if="start">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none"><path d="M3 9H21M7 3V5M17 3V5M6 12H8M11 12H13M16 12H18M6 15H8M11 15H13M16 15H18M6 18H8M11 18H13M16 18H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            {{ day }} {{ date }}
        </div>
        <div class="match-summary__info" v-if="start">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9426 1.25H12.0574C14.3658 1.24999 16.1748 1.24998 17.5863 1.43975C19.031 1.63399 20.1711 2.03933 21.0659 2.93414C21.9607 3.82895 22.366 4.96897 22.5603 6.41371C22.75 7.82519 22.75 9.63423 22.75 11.9426V12.0574C22.75 14.3658 22.75 16.1748 22.5603 17.5863C22.366 19.031 21.9607 20.1711 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.03933 20.1711 1.63399 19.031 1.43975 17.5863C1.24998 16.1748 1.24999 14.3658 1.25 12.0574V11.9426C1.24999 9.63423 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63423 1.24999 11.9426 1.25ZM6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62177 2.75 12C2.75 14.3782 2.75159 16.0864 2.92637 17.3864C3.09825 18.6648 3.42514 19.4355 3.9948 20.0052C4.56445 20.5749 5.33517 20.9018 6.61358 21.0736C7.91356 21.2484 9.62177 21.25 12 21.25C14.3782 21.25 16.0864 21.2484 17.3864 21.0736C18.6648 20.9018 19.4355 20.5749 20.0052 20.0052C20.5749 19.4355 20.9018 18.6648 21.0736 17.3864C21.2484 16.0864 21.25 14.3782 21.25 12C21.25 9.62177 21.2484 7.91356 21.0736 6.61358C20.9018 5.33517 20.5749 4.56445 20.0052 3.9948C19.4355 3.42514 18.6648 3.09825 17.3864 2.92637C16.0864 2.75159 14.3782 2.75 12 2.75C9.62177 2.75 7.91356 2.75159 6.61358 2.92637ZM12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V11.6893L15.0303 13.9697C15.3232 14.2626 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2626 15.3232 13.9697 15.0303L11.8358 12.8964C11.5468 12.6074 11.4022 12.4629 11.3261 12.2791C11.25 12.0954 11.25 11.891 11.25 11.4822V8C11.25 7.58579 11.5858 7.25 12 7.25Z" fill="currentColor"/></svg>
            {{ hour }}
        </div>
        <div class="match-summary__info" v-if="start">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 512a192 192 0 1 0 0-384 192 192 0 0 0 0 384zm0 64a256 256 0 1 1 0-512 256 256 0 0 1 0 512z"/><path fill="currentColor" d="M512 512a32 32 0 0 1 32 32v256a32 32 0 1 1-64 0V544a32 32 0 0 1 32-32z"/><path fill="currentColor" d="M384 649.088v64.96C269.76 732.352 192 771.904 192 800c0 37.696 139.904 96 320 96s320-58.304 320-96c0-28.16-77.76-67.648-192-85.952v-64.96C789.12 671.04 896 730.368 896 800c0 88.32-171.904 160-384 160s-384-71.68-384-160c0-69.696 106.88-128.96 256-150.912z"/></svg>
            {{ game.location }}, {{ game.state }}
        </div>
        <div class="match-summary__info" v-if="!start">
            {{ status }}
        </div>
    </div>
</template>

<style scoped>
.match-summary__info-container {
    @apply flex flex-row justify-center items-center gap-5 text-white bg-neutral-700 mx-auto px-5 py-1 z-40;
}
.match-summary__info-container .match-summary__info {
    @apply capitalize flex items-center gap-1;
}
</style>

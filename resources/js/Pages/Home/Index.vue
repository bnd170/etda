<script setup>
import Default         from "~/Layout/Default.vue";
import NextGamesWidget from "~/Components/Games/Home/NextGamesWidget.vue";
import {ref}           from "vue";

defineOptions({layout: Default})

// defineProps({
//     games: {
//         type: Array,
//         required: true
//     }
// });

const games = ref([
    {
        id: 1,
        home_team: {
            name: "S.D. Eibar",
            logo: "https://cdn0.iconfinder.com/data/icons/cup/154/football-shield-club-sport-512.png"
        },
        away_team: {
            name: "C.D. Tenerife",
            logo: "https://cdn0.iconfinder.com/data/icons/cup/154/football-shield-club-sport-512.png"
        },
        date: "2021-10-24T16:30:00.000000Z",
        venue: "Anfield",
        status: "pending",
        streaming: "https://www.youtube.com/watch?v=6Dh-RL__uN4",
    },
    {
        id: 2,
        home_team: {
            name: "Hércules Paralimpico",
            logo: "https://cdn0.iconfinder.com/data/icons/cup/154/football-shield-club-sport-512.png"
        },
        away_team: {
            name: "Disport Smart Joie",
            logo: "https://cdn0.iconfinder.com/data/icons/cup/154/football-shield-club-sport-512.png"
        },
        date: "2021-10-24T16:30:00.000000Z",
        venue: "Anfield",
        status: "pending",
        streaming: "https://www.youtube.com/watch?v=6Dh-RL__uN4",
    },
    {
        id: 3,
        home_team: {
            name: "Segunda Parte Elencor",
            logo: "https://cdn0.iconfinder.com/data/icons/cup/154/football-shield-club-sport-512.png"
        },
        away_team: {
            name: "FEXFC",
            logo: "https://cdn0.iconfinder.com/data/icons/cup/154/football-shield-club-sport-512.png"
        },
        date: "2021-10-24T16:30:00.000000Z",
        venue: "Anfield",
        status: "pending",
        streaming: "https://www.youtube.com/watch?v=6Dh-RL__uN4",
    },
]);
</script>

<template>
    <NextGamesWidget :games="games"/>
</template>

<template>
    <div class="box flex flex-col">
        <h2 class="box-title">{{ title }}</h2>
        <Carousel autoplay loop :autoplayTimeout="4000"
                  :pagination-enabled="false"
                  :per-page-custom="[[320,1], [1024,2], [1280,2]]">
            <slide v-for="game in gamesToShow" :key="game.id">
                <Game :game="game"/>
            </slide>
        </Carousel>
    </div>
</template>

<script setup>
import {computed}        from "vue";
import Game              from "~/Components/Games/Home/Widget/Game.vue";
import {Carousel, Slide} from '@jambonn/vue-concise-carousel';
import '@jambonn/vue-concise-carousel/lib/vue-concise-carousel.css'

const props = defineProps({
    games: {
        type: Array,
        required: true
    },
    title: {
        type: String,
        required: false
    }
});

const gamesToShow = computed(() => {
    return props.games.filter(game => game.home_team && game.away_team);
});
</script>


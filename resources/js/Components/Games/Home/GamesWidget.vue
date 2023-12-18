<template>
    <div class="flex flex-col">
        <div class="flex flex-col w-full mb-5">
            <h2 class="section-header">{{ title }}</h2>
        </div>
        <Carousel autoplay loop :autoplayTimeout="4000"
                  :pagination-enabled="false"
                  :per-page-custom="[[320,1], [1024,2], [1280,3], [1536,4]]">
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


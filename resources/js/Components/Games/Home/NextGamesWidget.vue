<template>
    <div class="flex flex-col">
        <div class="flex flex-col w-full mb-5">
            <h2 class="section-header">Próximos partidos</h2>
        </div>
        <Carousel autoplay loop autoplayTimeout="4000"
                  :pagination-enabled="false"
                  :per-page-custom="[[320,1], [1024,2], [1280,3], [1536,4]]">
            <slide v-for="game in games" :key="game.id">
                <Game :game="game" />
            </slide>
        </Carousel>
    </div>
</template>

<script setup>
import Game from "~/Components/Games/Game.vue";
import { Carousel, Slide } from '@jambonn/vue-concise-carousel';
import '@jambonn/vue-concise-carousel/lib/vue-concise-carousel.css'

defineProps({
    games: {
        type: Array,
        required: true
    }
});
</script>


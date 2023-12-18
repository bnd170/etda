<script setup>
import Default           from "~/Layout/Default.vue";
import GamesWidget       from "~/Components/Games/Home/GamesWidget.vue";
import {Carousel, Slide} from '@jambonn/vue-concise-carousel';

defineOptions({layout: Default})

defineProps({
    nextGames: {
        type: Array,
        required: true
    },
    playedGames: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <div>
        <Carousel autoplay loop :autoplayTimeout="4000"
                  :pagination-enabled="false"
                  :per-page-custom="[[320,1]]">
            <slide>
                <div class="relative  transition duration-300 ease-out">
                    <img
                        src="https://www.fedpc.org/wp-content/uploads/WhatsApp-Image-2023-04-23-at-13.26.44-1-1024x768.jpeg"
                        class="object-cover w-full h-[600px]" alt="Campeon de Liga"/>
                    <div
                        class="absolute pt-5 pb-3 bottom-0 px-10 backdrop-brightness-50 bg-back/30 w-full flex flex-col">
                        <div class="flex flex-row items-center space-x-2 mb-5">
                            <div class="relative flex h-4 w-4 ">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                            </div>
                            <p class="text-gray-300 uppercase w-full font-bold">Última hora</p>
                        </div>
                        <h2 class="text-white text-4xl w-full font-bold">LA SD ÉIBAR CONQUISTA LA LIGA NACIONAL DE
                            FÚTBOL 7</h2>
                    </div>
                </div>
            </slide>
        </Carousel>
    </div>
    <GamesWidget class="mt-20" :games="nextGames" title="Próximos partidos" v-if="nextGames.length"/>
    <GamesWidget class="mt-20" :games="playedGames" title="Resultados" v-if="playedGames.length" />
</template>

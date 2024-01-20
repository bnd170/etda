<script setup>
import Default           from "~/Layout/Default.vue";
import GamesWidget       from "~/Components/Games/Home/GamesWidget.vue";
import {Carousel, Slide} from '@jambonn/vue-concise-carousel';
import Table             from "~/Components/Ranking/Table.vue";

defineOptions({layout: Default})

defineProps({
    nextGames: {
        type: Array,
        required: true
    },
    playedGames: {
        type: Array,
        required: true
    },
    ranking: {
        type: Array,
        required: true
    },
    news: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <div class="container mx-auto">
        <div>
            <Carousel autoplay loop :autoplayTimeout="4000"
                      :pagination-enabled="false"
                      :per-page-custom="[[320,1]]">
                <slide v-for="article in news">
                    <a :href="route('news.post', {'slug': article.slug})">
                        <div class="relative  transition duration-300 ease-out">
                            <img
                                :src="article.cover"
                                class="object-cover w-full h-[600px]" alt="Campeon de Liga"/>
                            <div
                                class="absolute pt-5 pb-5 bottom-0 px-10 backdrop-brightness-50 bg-back/30 w-full flex flex-col">
                                <h2 class="text-white text-4xl w-full font-bold">{{ article.title }}</h2>
                            </div>
                        </div>
                    </a>
                </slide>
            </Carousel>
        </div>
        <div class="flex flex-col lg:flex-row lg:space-x-5 xl:space-x-10 items-start mt-10">
            <div class="w-full lg:w-8/12">
                <GamesWidget class="w-full" :games="nextGames" title="Próximos partidos" v-if="nextGames.length"/>
                <GamesWidget class="w-full mt-10" :games="playedGames" title="Resultados" v-if="playedGames.length"/>
            </div>
            <div class="box w-full lg:w-4/12">
                <div class="box-title">CLASIFICACIÓN</div>
                <Table :ranking="ranking" short/>
                <a class="btn btn-block btn-ghost mt-10" :href="route('national-league.index')">Más detalles</a>
            </div>
        </div>


    </div>
</template>

<script setup>
import Default    from "~/Layout/Default.vue";
import {Head}     from "@inertiajs/vue3";
import Card       from 'primevue/card';
import Paginator  from 'primevue/paginator';
import {computed} from "vue";

defineOptions({layout: Default})

const props = defineProps({
    episodes: {
        type: Array,
        required: true
    },
})
const episodesUrl = computed(() => props.episodes.data.map(e => `https://open.spotify.com/embed/episode/${e}?utm_source=generator&theme=0`))
</script>

<template>
    <Head>
        <title>Podcasts - Episodios</title>
    </Head>
    <div class="container mx-auto">
        <Card>
            <template #title>
                <h1 class="text-2xl font-bold">Nuestro podcast - Episodios</h1>
            </template>
            <template #content>
                <div class="mb-10 ">
                    <p class="text-xl mb-3">&iexcl;Bienvenido a nuestro podcast!</p>
                    <p>Descubre una nueva forma de conocer este deporte y a sus principales protagonistas, como futbolistas, entrenadores e incluso algunos fervientes aficionados.</p>
                    <p>Además, podrás mantenerte al tanto de la actualidad de la selección española, la federación e incluso algunas polémicas.</p>
                </div>
                <template v-for="episodeUrl in episodesUrl">
                    <iframe style="border-radius:12px"
                            :src="episodeUrl"
                            width="100%"
                            height="152"
                            frameBorder="0"
                            allowfullscreen=""
                            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                            loading="lazy">
                    </iframe>
                </template>
            </template>
            <template #footer>
                <Paginator v-if="episodes.total > 10" :rows="10" :totalRecords="episodes.total"></Paginator>
            </template>
        </Card>
    </div>
</template>


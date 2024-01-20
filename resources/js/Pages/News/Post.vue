<script setup>
import Default    from "~/Layout/Default.vue";
import {computed} from "vue";
import Spacer     from "~/Components/Layout/Spacer.vue";
import { Head } from '@inertiajs/vue3'


defineOptions({layout: Default})
const props = defineProps({
    news: {
        type: Object,
        required: true
    }
})
const createdAt = computed(() => {
    const date = new Date(props.news.created_at);
    return date.toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
})
</script>

<template>
    <Head>
        <title>{{ news.title }}</title>
    </Head>
    <article class="container mx-auto">
        <div class="box container mx-auto">
            <img
                class="object-scale-down xl:object-cover w-full h-[10rem] md:h-[22rem] lg:h-[30rem] mb-7 md:mb-10 rounded-xl"
                :src="news.cover" :alt="news.title">
            <h1 class="text-3xl md:text-5xl font-[Cabin] font-extrabold">{{ news.title }}</h1>
            <p class="mt-3">{{ createdAt }}</p>
            <spacer/>
            <div class="body" v-html="news.content"></div>
        </div>
    </article>
</template>

<style>
article {
    @apply lg:mx-64;
}

.body > p {
    @apply md:text-xl leading-7 text-justify;
}

.container {
    @apply max-w-[80rem];
}
</style>

<script setup>
import Default    from "~/Layout/Default.vue";
import {computed} from "vue";
import Spacer     from "~/Components/Layout/Spacer.vue";
import {Head}     from '@inertiajs/vue3'
import Card       from "primevue/card";


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
    <Card class="container mx-auto">
        <template #title>
            <h3 class="box-title">ACTUALIDAD</h3>
        </template>
        <template #content>
            <img
                class="object-scale-down xl:object-cover w-full h-[10rem] md:h-[22rem] lg:h-[30rem] mb-7 md:mb-10 rounded-xl"
                :src="news.cover" :alt="news.title">
            <h1 class="text-3xl md:text-5xl font-[Cabin] font-extrabold">{{ news.title }}</h1>
            <p class="mt-3">{{ createdAt }}</p>
            <spacer/>
            <div class="news-body" v-html="news.content"></div>
        </template>
    </Card>
</template>

<style>
article {
    @apply lg:mx-64;
}

.container {
    @apply max-w-[80rem];
}

.news-body > p {
    @apply md:text-xl;
    line-height: 2.5rem;
}

.news-body h2 {
    @apply text-3xl font-[Cabin] font-bold mt-10;
}

.news-body a {
    @apply text-blue-500 underline;
}

</style>

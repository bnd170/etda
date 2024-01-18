<script setup>
import Default         from "~/Layout/Default.vue";
import {computed, ref} from "vue";
import Spacer          from "~/Components/Layout/Spacer.vue";

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
    <article>
        <img class="object-cover w-full h-[10rem] md:h-[22rem] lg:h-[40rem] mb-7 md:mb-20"
             :src="news.cover_image" :alt="news.title">
        <div class="box container mx-auto">
            <h1 class="text-3xl md:text-5xl">{{ news.title }}</h1>
            <p class="mt-3">{{ createdAt }}</p>
            <spacer />
            <div class="body" v-html="news.content"></div>
        </div>
    </article>
</template>

<style>
article {
    @apply lg:mx-64;
}
.body > p {
    @apply my-10 md:text-xl leading-7 text-justify;
}
</style>

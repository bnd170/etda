<script setup>
defineProps({
    news: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <article v-for="article in news" class="card bg-base-300/10 overflow-hidden">
        <a :href="route('news.post', {'slug': article.slug})">
            <figure class="max-h-60 xl:max-h-[30rem]">
                <img :src="article.cover_image" :alt="article.title" :title="article.title"/>
            </figure>
        </a>
        <div class="card-body">
            <a :href="route('news.post', {'slug': article.slug})">
                <h2 class="card-title text-2xl">{{ article.title }}</h2>
            </a>
            <div class="card-actions justify-end mt-5">
                <a class="btn btn-sm" :href="route('news.post', {'slug': article.slug})">Leer más</a>
            </div>
        </div>
    </article>
</template>

<style>
article {
    @apply m-0;
}
</style>

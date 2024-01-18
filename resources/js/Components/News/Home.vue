<script setup>
defineProps({
    news: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <article v-for="article in news" class="card xl:card-side bg-base-300">
        <figure class="max-h-60 xl:max-h-96">
            <img :src="article.cover_image" :alt="article.title" :title="article.title"/>
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ article.title }}</h2>
            <div class="card-actions justify-end block">
                <a class="btn" :href="route('news.post', {'slug': article.slug})">Leer más</a>
            </div>
        </div>
    </article>
</template>

<style>
article {
    @apply m-0;
}
</style>

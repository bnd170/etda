<script setup>
import Card   from 'primevue/card';
import Button from 'primevue/button';

defineProps({
    news: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <Card v-for="article in news" class="card bg-base-300/10 overflow-hidden">
        <template #header>
            <a :href="route('news.post', {'slug': article.slug})">
                <figure class="max-h-60 xl:max-h-[30rem]">
                    <img :src="article.cover" :alt="article.title" :title="article.title"/>
                </figure>
            </a>
        </template>
        <template #title>
            <a :href="route('news.post', {'slug': article.slug})">
                <h2 class="card-title text-2xl">{{ article.title }}</h2>
            </a>
        </template>
        <template #footer>
            <div class="flex justify-end">
                <a :href="route('news.post', {'slug': article.slug})">
                    <Button label="Leer más" link/>
                </a>
            </div>
        </template>
    </Card>
</template>

<style>
article {
    @apply m-0;
}
</style>

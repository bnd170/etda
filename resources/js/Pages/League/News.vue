<script setup>
import Default  from "~/Layout/Default.vue";
import Header   from "~/Components/League/Header.vue";
import NewsHome from "~/Components/News/Home.vue";
import {Head}   from "@inertiajs/vue3";
import Card     from 'primevue/card';

defineProps({
    news: {
        type: Array,
        required: true
    }
})

defineOptions({layout: Default})
</script>

<template>
    <Head>
        <title>Actualidad - Liga nacional de fútbol 7 PC/DCA</title>
    </Head>
    <div class="container mx-auto">
        <Header/>

        <Card>
            <template #title>
                <h3 class="box-title">ACTUALIDAD</h3>
            </template>
            <template #content>
                <div class="grid md:grid-cols-2 gap-10">
                    <NewsHome :news="news"/>
                </div>
            </template>
        </Card>
    </div>
</template>

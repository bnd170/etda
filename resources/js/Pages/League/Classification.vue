<script setup>
import Default  from "~/Layout/Default.vue";
import Spacer   from "~/Components/Layout/Spacer.vue";
import Header   from "~/Components/League/Header.vue";
import Table    from "~/Components/League/Table.vue";
import NewsHome from "~/Components/News/Home.vue";
import {Head}   from "@inertiajs/vue3";
import Card from 'primevue/card';

defineProps({
    season: {
        type: Object,
        required: true
    },
    ranking: {
        type: Array,
        required: true
    }
})

defineOptions({layout: Default})
</script>

<template>
    <Head>
        <title>Clasificación - Liga nacional de fútbol 7 PC/DCA</title>
    </Head>
    <div class="container mx-auto">
        <Header/>
        <Card>
            <template #title>
                <h3 class="box-title">CLASIFICACIÓN</h3>
            </template>
            <template #content>
                <Table :ranking="ranking"/>
            </template>
        </Card>
    </div>
</template>

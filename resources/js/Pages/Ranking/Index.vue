<script setup>
import Default  from "~/Layout/Default.vue";
import Spacer   from "~/Components/Layout/Spacer.vue";
import Table    from "~/Components/Ranking/Table.vue";
import NewsHome from "~/Components/News/Home.vue";

defineProps({
    season: {
        type: Object,
        required: true
    },
    ranking: {
        type: Array,
        required: true
    },
})

defineOptions({layout: Default})
</script>

<template>
    <div class="container mx-auto">
        <Spacer/>
        <div class="flex flex-col w-full mb-5">
            <h2 class="section-header">Clasificación</h2>
        </div>
        <Table :ranking="ranking"/>

        <Spacer/>
        <div class="flex flex-col w-full mb-10">
            <h2 class="section-header">Actualidad</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-10">
            <NewsHome/>
        </div>
    </div>
</template>

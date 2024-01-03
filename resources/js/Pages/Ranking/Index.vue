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
        <div class="box">
            <div class="box-title">CLASIFICACIÓN</div>
            <Table :ranking="ranking"/>
        </div>

        <Spacer/>
        <div class="box">
            <div class="box-title">ACTUALIDAD</div>
            <div class="grid md:grid-cols-2 gap-10">
                <NewsHome/>
            </div>
        </div>
    </div>
</template>

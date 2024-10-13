<script setup>
import {ref} from 'vue';
import {usePage} from '@inertiajs/vue3';
import TabMenu from 'primevue/tabmenu';

const page = usePage();
const items = ref([
    {
        label: 'Encuentros',
        icon: 'pi pi-calendar',
        route: 'predictor.index',
        params: {tournament: page.props.tournament.slug}
    },
    {
        label: 'Clasificación',
        icon: 'pi pi-chart-bar',
        route: 'predictor.ranking',
        params: {tournament: page.props.tournament.slug}
    },
    {
        label: 'Mis predicciones',
        icon: 'pi pi-user',
        route: 'predictor.my-predictions',
        params: {tournament: page.props.tournament.slug}
    },
]);

const active = ref(items.value.findIndex(item => item.route===route().current()));
</script>

<template>
    <TabMenu class="mt-8" :model="items" v-model:activeIndex="active">
        <template #item="{ item, props }">
            <a v-if="item.route" v-ripple :href="route(item.route, item.params)" v-bind="props.action"
               class="dark:hover:bg-surface-800 text-surface-500">
                <span v-bind="props.icon"/>
                <span v-bind="props.label">{{ item.label }}</span>
            </a>
            <a v-else v-ripple :href="item.url" :target="item.target" v-bind="props.action">
                <span v-bind="props.icon"/>
                <span v-bind="props.label">{{ item.label }}</span>
            </a>
        </template>
    </TabMenu>
</template>


<script setup>
import Tabmenu from "primevue/tabmenu";
import {ref}   from "vue";

const items = ref([
    {label: 'Actualidad', icon: 'pi pi-globe', route: 'national-league.news'},
    {label: 'Clasificacion', icon: 'pi pi-chart-bar', route: 'national-league.classification'},
    {label: 'Estadisticas', icon: 'pi pi-list', route: 'national-league.stats'},
    {label: 'Calendario', icon: 'pi pi-calendar', route: 'national-league.calendar'},
    // {label: 'Equipos', icon: 'pi pi-users', route: 'national-league.teams'},
]);
const active = ref(items.value.findIndex(item => item.route === route().current()));


</script>

<template>
    <Tabmenu :model="items" v-model:activeIndex="active">
        <template #item="{ item, props }">
            <a v-if="item.route" v-ripple :href="route(item.route)" v-bind="props.action" class="dark:hover:bg-surface-800 text-surface-500">
                <span v-bind="props.icon"/>
                <span v-bind="props.label">{{ item.label }}</span>
            </a>
            <a v-else v-ripple :href="item.url" :target="item.target" v-bind="props.action">
                <span v-bind="props.icon"/>
                <span v-bind="props.label">{{ item.label }}</span>
            </a>
        </template>
    </Tabmenu>
</template>

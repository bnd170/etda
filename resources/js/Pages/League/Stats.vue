<script setup>
import TopStats from "~/Components/Team/TopStats.vue";
import Default        from "~/Layout/Default.vue";
import {Head, router} from "@inertiajs/vue3";
import Header         from "~/Components/League/Header.vue";
import Card     from 'primevue/card';
import Menu     from 'primevue/menu';
import Button   from 'primevue/button';
import {ref}    from "vue";


const props = defineProps({
    stats: {
        type: Array,
        required: true
    },
    top_stats: {
        type: Array,
        required: true
    },
    days: {
        type: Array,
        required: true
    },
    day: {
        type: String,
        required: true
    }
})

const items = ref([
    {
        label: 'Selecciona jornada',
        items: [
            {
                label: "Todas",
                href: route('national-league.stats'),
                class: {
                    'text-primary': 'all' === props.day,
                },
            },
            ...props.days.map(day => {
                return {
                    label: `Jornada ${day.day}`,
                    href: day.status === 'pending' ? '#' : route('national-league.stats', {day: day.day}),
                    class: {
                        'text-slate-300': day.status === 'pending',
                        'text-primary-400': day.day == props.day,
                    },
                }
            })
        ]
    }
]);
const menu = ref();
const toggle = (event) => {
    menu.value.toggle(event);
};

defineOptions({layout: Default})
</script>

<template>
    <Head>
        <title>Estadísticas - Liga nacional de fútbol 7 PC/DCA</title>
    </Head>
    <div class="container mx-auto">
        <Header/>
        <Card>
            <template #title>
                <div class="flex flex-row justify-between items-center">
                    <div class="box-title">TOP ESTADISTICAS</div>
                    <Button type="button" icon="pi pi-cog" @click="toggle" aria-haspopup="true" severity="primary"
                            aria-controls="overlay_menu"/>
                    <Menu ref="menu" id="overlay_menu" :model="items" :popup="true">
                        <template #item="{ item, props }">
                            <a v-ripple :href="item.href" class="flex align-items-center"  v-bind="props.action">
                                <span :class="item.icon" />
                                <span class="ml-2" :class="item.class">{{ item.label }}</span>
                            </a>
                        </template>
                    </Menu>
                </div>
            </template>
            <template #content>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!--                <TopStats stat_name="Posesión" :top_stat="top_stats.possession" is_percentage/>-->
                    <TopStats stat_name="Goles" :top_stat="top_stats.goals"/>
                    <TopStats stat_name="Disparos" :top_stat="top_stats.shoots"/>
                    <TopStats stat_name="Efectividad" :top_stat="top_stats.proratedEffectivity" is_percentage/>
                    <TopStats stat_name="Pases" :top_stat="top_stats.passes"/>
                    <TopStats stat_name="Robos" :top_stat="top_stats.steals"/>
                    <TopStats stat_name="Faltas cometidas" :top_stat="top_stats.fouls"/>
                    <TopStats stat_name="Corners" :top_stat="top_stats.corners"/>
                    <TopStats stat_name="Penaltis" :top_stat="top_stats.penalties"/>
                    <TopStats stat_name="T. amarillas" :top_stat="top_stats.yellowCards"/>
                    <TopStats stat_name="T. rojas" :top_stat="top_stats.redCards"/>
                </div>
            </template>
        </Card>
    </div>
</template>


<script setup>
import Default from "~/Layout/Default.vue";
import {Head}  from "@inertiajs/vue3";

defineOptions({layout: Default})
const header = '/img/el-proyecto.webp'
</script>
<template>
    <Head>
        <title>El proyecto</title>
    </Head>
    <div class="container mx-auto">
        <img :src="header" alt="Logo" class="object-contain">
    </div>
    <div class="container static 2xl:mx-auto flex flex-col gap-6 md:px-20 px-10 mt-10">
        <h1 class="text-4xl font-[Cabin]">El proyecto</h1>

        <h2 class="title">El origen</h2>
        <p>Imaginen que en el fútbol profesional español no hubiera ninguna estadística ni datos de los encuentros. ¿Cuántos pases buenos dió Kroos? ¿Cuántas ocasiones de gol tuvo Lewandowski? No lo sabríamos. Impensable, ¿verdad? Pues esa es la realidad de otro fútbol. En la primera categoría del Fútbol 7 PC/DCA español (jugadores con lesión cerebral) no sabemos qué equipo tuvo más ocasiones o qué jugador dió más pases buenos.</p>
        <p>El Talón de Aquiles es un proyecto del Fútbol PC/DCA para el Fútbol PC/DCA. Un grupo de jugadores de la propia liga, en colaboración con la FEDPC, entidad organizadora, hemos impulsado El Talón de Aquiles para profesionalizar la Liga Nacional de Fútbol 7 PC/DCA, aportando datos, noticias y contenido de calidad.</p>
        <p>Todos los jugadores, técnicos y aficionados al Fútbol PC/DCA encontraréis en esta página toda la información de vuestros equipos: datos de los jugadores, estadísticas de los partidos, la clasificación en tiempo real,... Si quieres saber qué equipo es el más efectivo, el que da más pases o el que defiende mejor, éste es tu sitio.</p>
        <p>Además, aquí también encontrarás la mejor información de la Liga Nacional de Fútbol 7 PC/DCA: previas y post de las jornadas, resultados, entrevistas y la actualidad de la selección española. Todo lo que quieres saber sobre este fútbol está aquí, en el Talón de Aquiles.</p>
    </div>
</template>

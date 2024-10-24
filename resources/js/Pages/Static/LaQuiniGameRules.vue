<script setup>
import Default from "~/Layout/Default.vue";
import {Head}  from "@inertiajs/vue3";

defineOptions({layout: Default})
const header = '/img/el-proyecto.webp'
</script>
<template>
    <Head>
        <title>Las reglas de La Quini</title>
    </Head>
    <div class="container mx-auto">
        <img :src="header" alt="Logo" class="object-contain">
    </div>
    <section class="container static 2xl:mx-auto flex flex-col gap-6 md:px-20 px-10 mt-10">
        <header>
            <h1 class="text-4xl font-[Cabin] ">Las reglas de La Quini</h1>
        </header>

        <section class="flex flex-col gap-6 pb-20">
            <h2 class="title">Reglas de participación</h2>
            <p class="text-justify">
                Todo usuario que participe en la Quini debe aceptar las presentes reglas de participación. El
                incumplimiento de dichas reglas supondrá la inelegibilidad para recibir cualquier premio.
            </p>

            <h3 class="title">Igualdad de oportunidades</h3>
            <p>Está prohibido el uso de más de una cuenta por usuario. En caso de que el equipo del Talón de Aquiles
                detecte un comportamiento sospechoso o inusual, este se reserva el derecho a eliminar la cuenta y
                restringir al usuario implicado</p>

            <h3 class="title">Puntuaciones</h3>
            <p>
                La puntuación de la Quini se calculará en base a los siguientes criterios:
            </p>
            <ul class="list-disc pl-10 list-inside">
                <li><strong>+3 puntos</strong> por acertar el pronóstico (1X2).</li>
                <li><strong>-1 punto</strong> por cada fallo.</li>
                <li><strong>+5 puntos</strong> extra por acertar el resultado exacto del partido.</li>
            </ul>
            <p>Esto hace que por cada partido puedas ganar un máximo de 8 puntos y perder 1.</p>

            <h3 class="title">Ganador</h3>
            <p>El ganador del juego será aquel que logre más puntuación total al finalizar el torneo.</p>

            <p>En caso de empate entre dos o más participantes, se revisarán los siguientes coeficientes en orden:</p>
            <ol class="list-decimal pl-10 list-inside">
                <li>Que haya acertado más resultados exactos.</li>
                <li>Que haya acertado más pronósticos.</li>
                <li>Que haya fallado menos pronósticos.</li>
                <li>Por orden de participación. <i>(El que introdujese antes el pronóstico)</i></li>
            </ol>

            <h3 class="title">Premios</h3>
            <p>El premio de la Quini será anunciado en los próximos días por parte de El Talón de Aquiles. Asimismo, el
                Talón de Aquiles se reserva el derecho de cambiarlo o no enviarlo si el coste del envío supone más del
                50% del coste total del premio.</p>
        </section>
    </section>
</template>

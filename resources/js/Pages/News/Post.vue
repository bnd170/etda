<script setup>
import Default from "~/Layout/Default.vue";
import {ref}   from "vue";
import Spacer  from "~/Components/Layout/Spacer.vue";

defineOptions({layout: Default})

const post = ref({
    title: 'Navalmoral de la mata pondrá el broche final a la temporada 22/23',
    date: '04-04-2023',
    author: 'Pol Aguilar',
    body: '<p>SD Éibar, Hércules Paralímpico, Disport FC y AMDDA Málaga. Son los cuatro equipos que pelearán por el título de la Liga Nacional de fútbol 7 que organiza la Federación Española de Deportes de Personas con Parálisis Cerebral y Daño Cerebral Adquirido. El campeón se decidirá este fin de semana (22 y 23 de abril) en el Campo Municipal de Navalmoral de la Mata (Cáceres).</p> <p>El conjunto vasco se ha convertido en la revelación de esta temporada tras firmar una gran fase regular al liderar la clasificación con seis victorias y un empate. Con David Gámiz, Sergio Rueda, Yerik Martínez o Josué Almeida en sus filas, el equipo armero peleará por alzar el trofeo. Para ello, tendrá que superar primero en las semifinales al cuarto clasificado, el AMDDA, que tratará de dar la sorpresa. El encuentro será el sábado a las 12.00 horas.</p> <p>Antes, a las 10.00 horas, se disputará el otro cruce de las semifinales entre el Hércules, que ha vuelto a realizar una gran campaña en la Liga regular tras ser segundo, y el Disport, tercero en la tabla y campeón de las dos últimas ediciones. Los vencedores de ambas eliminatorias se medirán en la final el domingo a las 12.00 horas. El partido por el tercer puesto será también el domingo a las 10.00 horas.</p> <p>Además, el sábado por la tarde se dilucidará el resto de posiciones: CD Tenerife y FEXDPC se enfrentarán a las 16.00 por el séptimo y octavo puesto, mientras que Levante UD y Fundación Segunda Parte DCA lo harán a las 18.00 por el quinto y sexto puesto. La competición se podrá seguir en directo en el siguiente <a href="https://www.youtube.com/watch?v=fvgc4K1LbEU">enlace</a></p>'
})
</script>

<template>
    <article>
        <img class="object-cover w-full h-[10rem] md:h-[22rem] lg:h-[40rem] mb-7 md:mb-20" src="https://www.fedpc.org/wp-content/uploads/CARTEL-LNF7-2023-NAVALMORAL-1-724x1024.png" :alt="post.title">
        <div class="box container mx-auto">
            <h1 class="text-3xl md:text-5xl">{{ post.title}}</h1>
            <p class="mt-3">{{ post.date }} - Por: <b>{{ post.author }}</b></p>
            <spacer />
            <div class="body" v-html="post.body"></div>
        </div>
    </article>
</template>

<style>
article {
    @apply lg:mx-64;
}
.body > p {
    @apply my-10 md:text-xl leading-7 text-justify;
}
</style>

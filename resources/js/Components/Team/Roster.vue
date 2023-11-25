<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-10">
        <PlayerCard :player="player" v-for="player in players" />
    </div>
</template>

<script setup>
import PlayerCard from '~/Components/Player/Card.vue';
import {ref}      from "vue";

const players = ref([
    {
        name: 'Borja Pombo',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Portero',
        age: '33',
        number: '1',
        classification: '1'
    },
    {
        name: 'Martin Ruiz',
        photo: 'https://www.canteradeportiva.net/images/04_28_fedpc.jpg',
        position: 'Portero',
        age: '16',
        number: '13',
        classification: '1'
    },
    {
        name: 'Yerik Martinez',
        photo: 'https://estaticosgn-cdn.deia.eus/clip/a1bfe89a-e566-4613-b352-58e158de3c2c_16-9-discover-aspect-ratio_default_0_x506y260.jpg',
        position: 'Delantero',
        age: '17',
        number: '11',
        classification: '2'
    },
    {
        name: 'Hector Gadea',
        photo: 'https://pbs.twimg.com/media/E6pujIdWEAI83_t?format=jpg&name=small',
        position: 'Defensa',
        age: '63',
        number: '4',
        classification: '1'
    },
    {
        name: 'Ibai Goikoetxea',
        photo: 'https://estaticosgn-cdn.deia.eus/clip/3f67b352-fd35-44dd-b56a-ef82a6772f1c_16-9-aspect-ratio_default_0.jpg',
        position: 'Delantero',
        age: '18',
        number: '9',
        classification: '2'
    },
    {
        name: 'Aitor Ucin',
        photo: 'https://pbs.twimg.com/profile_images/1423353889806594048/RbXZhXwa_400x400.jpg',
        position: 'Defensa',
        age: '25',
        number: '21',
        classification: '1'
    },
    {
        name: 'Victor Varea',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Defensa',
        age: '35',
        number: '2',
        classification: '2'
    },
    {
        name: 'Sergio Rueda',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Centrocampista',
        age: '26',
        number: '5',
        classification: '2'
    },
    {
        name: 'Iker Sanz',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Defensa',
        age: '36',
        number: '3',
        classification: '1'
    },
    {
        name: 'Javi `Txin` Garcia',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Centrocampista',
        age: '34',
        number: '12',
        classification: '3'
    },
    {
        name: 'David Gamiz',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Centrocampista',
        age: '37',
        number: '10',
        classification: '3'
    },
    {
        name: 'Josue Almeida',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Delantero',
        age: '33',
        number: '7',
        classification: '2'
    },
    {
        name: 'Imanol Ballesteros',
        photo: 'https://statics-maker.llt-services.com/eib/images/2022/12/04/xlarge/9ff08fd8-4c56-4518-a9dc-6146aa0cf3a3.jpeg',
        position: 'Centrocampista',
        age: '36',
        number: '8',
        classification: '2'
    },

])
</script>

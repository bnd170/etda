<script setup>
import Default           from "~/Layout/Default.vue";
import NextGamesWidget   from "~/Components/Games/Home/NextGamesWidget.vue";
import {ref}             from "vue";
import {Carousel, Slide} from '@jambonn/vue-concise-carousel';

defineOptions({layout: Default})

// defineProps({
//     games: {
//         type: Array,
//         required: true
//     }
// });

const games = ref([
    {
        id: 1,
        journey: 1,
        home_team: {
            name: "Segunda Parte Elencor",
            logo: "https://fundacionsegundaparte.org/logos/logo-segunda-parte-corto.png"
        },
        away_team: {
            name: "C.D. Tenerife",
            logo: "https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/CD_Tenerife_logo.svg/1200px-CD_Tenerife_logo.svg.png"
        },
        date: "2024-01-27T14:00:00.000000Z",
        location: "Gapalagar",
        province: "Madrid",
        status: "pending",
    },
    {
        id: 2,
        journey: 1,
        home_team: {
            name: "C.D. AMDDA",
            logo: "https://i.postimg.cc/Hxn78kyp/logomalaga.png"
        },
        away_team: {
            name: "S.D. Eibar",
            logo: "https://upload.wikimedia.org/wikipedia/en/thumb/3/3b/SD_Eibar_logo_2016.svg/1200px-SD_Eibar_logo_2016.svg.png"
        },
        date: "2024-01-27T15:30:00.000000Z",
        location: "Gapalagar",
        province: "Madrid",
        status: "pending",
    },
    {
        id: 3,
        journey: 1,
        home_team: {
            name: "FEXFC",
            logo: "https://i.postimg.cc/wTy7drhG/00100-1000001230-Vertical-Color-3x-removebg-preview.png"
        },
        away_team: {
            name: "Hércules Paralimpico",
            logo: "https://upload.wikimedia.org/wikipedia/fr/thumb/a/a6/H%C3%A9rcules_Alicante.svg/1200px-H%C3%A9rcules_Alicante.svg.png"
        },
        date: "2024-01-27T17:00:00.000000Z",
        location: "Gapalagar",
        province: "Madrid",
        status: "pending",
    },
    {
        id: 4,
        journey: 2,
        home_team: {
            name: "Hércules Paralimpico",
            logo: "https://upload.wikimedia.org/wikipedia/fr/thumb/a/a6/H%C3%A9rcules_Alicante.svg/1200px-H%C3%A9rcules_Alicante.svg.png"
        },
        away_team: {
            name: "C.D. Tenerife",
            logo: "https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/CD_Tenerife_logo.svg/1200px-CD_Tenerife_logo.svg.png"
        },
        date: "2024-02-17T14:00:00.000000Z",
        location: "Alicante",
        province: "Alicante",
        status: "pending",
    },
    {
        id: 5,
        journey: 2,
        home_team: {
            name: "Disport Smart Joie",
            logo: "https://i.postimg.cc/d16TLT1N/BA86-CC09-EA40-4-C2-D-A290-C9-CF64-F4-A9-AE-removebg-preview.png"
        },
        away_team: {
            name: "C.D. AMDDA",
            logo: "https://i.postimg.cc/Hxn78kyp/logomalaga.png"
        },
        date: "2024-02-17T15:30:00.000000Z",
        location: "Alicante",
        province: "Alicante",
        status: "pending",
    },
    {
        id: 6,
        journey: 2,
        home_team: {
            name: "FEXFC",
            logo: "https://i.postimg.cc/wTy7drhG/00100-1000001230-Vertical-Color-3x-removebg-preview.png"
        },
        away_team: {
            name: "Segunda Parte Elencor",
            logo: "https://fundacionsegundaparte.org/logos/logo-segunda-parte-corto.png"
        },
        date: "2024-02-17T16:00:00.000000Z",
        location: "Alicante",
        province: "Alicante",
        status: "pending",
    },
]);
</script>

<template>
    <div>
        <Carousel autoplay loop autoplayTimeout="4000"
                  :pagination-enabled="false"
                  :per-page-custom="[[320,1]]">
            <slide>
                <div class="relative  transition duration-300 ease-out">
                    <img src="https://www.fedpc.org/wp-content/uploads/WhatsApp-Image-2023-04-23-at-13.26.44-1-1024x768.jpeg" class="object-cover w-full h-[600px]" alt="Campeon de Liga"/>
                    <div class="absolute pt-5 pb-3 bottom-0 px-10 backdrop-brightness-50 bg-back/30 w-full flex flex-col">
                         <div class="flex flex-row items-center space-x-2 mb-5">
                             <div class="relative flex h-4 w-4 ">
                                 <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                 <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                             </div>
                             <p class="text-gray-300 uppercase w-full font-bold">Última hora</p>
                         </div>
                        <h2 class="text-white text-4xl w-full font-bold">LA SD ÉIBAR CONQUISTA LA LIGA NACIONAL DE FÚTBOL 7</h2>
                    </div>
                </div>
            </slide>
        </Carousel>
    </div>
    <NextGamesWidget class="mt-20" :games="games"/>
</template>

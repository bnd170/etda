<script setup>
import Default                   from "~/Layout/Default.vue";
import Spacer                    from "~/Components/Layout/Spacer.vue";
import Menu                      from "~/Components/Ranking/Menu.vue";
import {ref}                     from "vue";
import {Hero, HeroContent, Text} from "daisy-ui-kit";
import Roster                    from "~/Components/Team/Roster.vue";

defineOptions({layout: Default})

const team = ref({
    name: 'SD Eibar',
    logo: 'https://upload.wikimedia.org/wikipedia/an/thumb/3/3b/SD_Eibar_logo_2016.svg/1200px-SD_Eibar_logo_2016.svg.png',
    header: 'https://www.fedpc.org/wp-content/uploads/CARTEL-LNF7-2023-NAVALMORAL-1.png',
    location: 'Eibar, Gipuzkoa',
    president: 'Ander Romarate',
    coach: 'Andoni Igartua',
    description: 'La Sociedad Deportiva Eibar es un club de fútbol de la ciudad de Eibar, Guipúzcoa, España. Fue fundado en 1940 y juega en la Primera División de España. Disputa sus partidos como local en el Estadio Municipal de Ipurúa, con capacidad para 7.083 espectadores.',
    awards: [
        {
            year: '2023',
            competition: 'Liga Nacional de Fútbol 7',
            position: 'Campeón',
            position_icon: '🥇'
        },
        {
            year: '2022',
            competition: 'Liga Nacional de Fútbol 7',
            position: 'Subcampeón',
            position_icon: '🥈'
        },
        {
            year: '2021',
            competition: 'Liga Nacional de Fútbol 7',
            position: 'Tercer puesto',
            position_icon: '🥉'
        },
    ]
})
</script>

<template>
    <Menu selected="teams"/>
    <Spacer/>
    <div class="flex flex-col w-full mb-5">
        <h2 class="section-header">{{ team.name }}</h2>
    </div>

    <Hero class="h-[32rem] mb-24">
        <HeroContent class="flex-col sm:flex-row">
            <img
                :src="team.logo"
                class="w-[15rem] h-[15rem] sm:w-[20rem] sm:h-[20rem] object-contain"
            >
            <div class="md:ml-10">
                <Text size="5xl" bold class="block">
                    {{ team.name }}
                </Text>
                <Text size="2xl">
                    {{ team.location }}
                </Text>
                <Text is="p" class="py-6">
                    {{ team.description }}
                </Text>
                <Text size="2xl" class="block">
                    Presidente/Responsable: <span class="font-bold">{{ team.president }}</span>
                </Text>
                <Text size="2xl" class="block">
                    Entrenador: <span class="font-bold">{{ team.coach }}</span>
                </Text>
            </div>
        </HeroContent>
    </Hero>

    <Spacer/>
    <div class="flex flex-col w-full mb-5">
        <h2 class="section-header">Palmarés</h2>
    </div>
    <div class="grid grid-cols-6">
        <div class="flex flex-col items-center" v-for="award in team.awards">
            <Text class="py-3 text-5xl">
                {{ award.position_icon }}
            </Text>
            <Text class="text-2xl">
                {{ award.year }}
            </Text>
            <Text>
                {{ award.competition }}
            </Text>
        </div>
    </div>

    <Spacer/>
    <div class="flex flex-col w-full mb-5">
        <h2 class="section-header">Plantilla</h2>
    </div>
    <Roster/>

</template>

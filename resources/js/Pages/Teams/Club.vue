<script setup>
import Default                   from "~/Layout/Default.vue";
import Spacer                    from "~/Components/Layout/Spacer.vue";
import Menu                      from "~/Components/Ranking/Menu.vue";
import {ref}                     from "vue";
import {Hero, HeroContent, Text} from "daisy-ui-kit";
import Roster                    from "~/Components/Team/Roster.vue";

defineOptions({layout: Default})

defineProps({
    team: {
        type: Object,
        required: true
    },
})

const tim = ref({
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

    <Hero class="mb-18">
        <HeroContent class="flex-col sm:flex-row">
            <img
                :src="team.logo"
                class="w-[15rem] h-[15rem] sm:w-[20rem] sm:h-[20rem] object-contain mb-6 sm:mb-0"
            >
            <div class="md:ml-10">
                <Text size="5xl" bold class="hidden md:block">
                    {{ team.name }}
                </Text>
                <Text size="2xl">
                    {{ team.location }}
                </Text>
                <Text is="p" class="py-6">
                    {{ team.description }}
                </Text>
                <Text size="xl" class="block">
                    Responsable <div class="font-bold">{{ team.president }}</div>
                </Text>
                <Text size="xl" class="block mt-3">
                    Entrenador <div class="font-bold">{{ team.coach }}</div>
                </Text>
            </div>
        </HeroContent>
    </Hero>

    <Spacer/>
    <div class="flex flex-col w-full mb-5">
        <h2 class="section-header">Palmarés</h2>
    </div>
    <div class="grid lg:grid-cols-6 grid-cols-2">
        <div class="flex flex-col items-center" v-for="award in tim.awards">
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

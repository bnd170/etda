<script setup>
import Default                   from "~/Layout/Default.vue";
import Spacer                    from "~/Components/Layout/Spacer.vue";
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

<style scoped>
.club-container {
    @apply w-full;
}

.club-header{
    @apply h-[30rem] w-full flex items-end relative;
    letter-spacing: -.4px;
}
.club-header__logo-container {
    @apply absolute left-0 bottom-0 flex justify-start items-center;
    z-index: 10;
}
.club-header-card  {
    @apply w-[27rem] h-[20rem] flex justify-center items-center relative rounded-tr-[2.5rem] overflow-hidden;
}
.club-header-card__slide-bg {
    @apply relative h-full opacity-60;
    flex: 1 1 50%;
}
.club-header-card__slide-bg--neutral {
    @apply bg-white opacity-100;
}
.club-header__logo {
    @apply w-full max-h-[15rem] absolute z-10 object-contain;
}
.club-image {
    @apply w-full h-full absolute flex justify-end items-end;
}
.club-image::before {
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    z-index: 1;
    background-color: rgba(0,0,0,.35);
}
.club-image-bg {
    @apply w-full h-full object-cover absolute block top-0 left-0;
    font-family: "object-fit: cover; object-position: center";
}
.club-title {
    position: relative;
    z-index: 10;
    margin-left: 32.4rem;
    margin-bottom: 2rem;
}
.club-title__name {
    font-size: 7rem;
    line-height: 6.5rem;
    font-weight: 600;
    color: #fff;
}
.club-title__info {
    font-size: 2rem;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
    color: #fff;
}
</style>

<template>
    <div class="club-container">
        <header class="club-header">
            <div class="club-header__logo-container">
                <div class="club-header-card">
                    <div class="club-header-card__slide-bg club-header-card__slide-bg--neutral"></div>
                    <div class="club-header-card__slide-bg" :style="`background-color: var(--${team.sheet_name}-start)`"></div>
                </div>
                <img
                    :src="team.logo"
                    class="club-header__logo"
                >
            </div>
            <div class="club-image">
                <img class="club-image-bg" src="https://statics-maker.llt-services.com/eib/images/2023/04/18/xlarge/d08f92d0-5bec-4123-b0e4-95adc57225c1.jpg" alt="">
            </div>
            <div class="club-title">
                <div class="club-title__name">{{ team.name }}</div>
                <div class="club-title__info">{{ team.city }}</div>
            </div>
        </header>
    </div>

    <div class="container mx-auto">
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
    </div>
</template>

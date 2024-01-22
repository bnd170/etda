<script setup>
import Default    from "~/Layout/Default.vue";
import Spacer     from "~/Components/Layout/Spacer.vue";
import {ref} from "vue";
import Roster     from "~/Components/Team/Roster.vue";
import {Head}     from "@inertiajs/vue3";

defineOptions({layout: Default})

const props = defineProps({
    team: {
        type: Object,
        required: true
    },
})

const have_awards = ref(props.team.awards.length);
</script>

<style scoped>
.club-container {
    @apply w-full;
}

.club-header {
    @apply h-[20rem] xl:h-[30rem] w-full flex items-end relative;
    letter-spacing: -.4px;
}

.club-header__logo-container {
    @apply absolute left-0 bottom-0 flex justify-start items-center ;
    z-index: 10;
}

.club-header__logo {
    @apply w-full max-h-[5rem] md:max-h-[8rem] lg:max-h-[10rem] xl:max-h-[15rem] absolute z-10 object-contain;
}

.club-header-card {
    @apply w-[7rem] h-[7rem] sm:w-[13rem] sm:h-[10rem] md:w-[16rem] md:h-[11rem] lg:w-[22rem] lg:h-[15rem] xl:w-[27rem] xl:h-[20rem] flex justify-center items-center relative rounded-tr-lg lg:rounded-tr-[2.5rem] overflow-hidden;
}

.club-header-card__slide-bg {
    @apply relative h-full opacity-60;
    flex: 1 1 50%;
}

.club-header-card__slide-bg--neutral {
    @apply bg-white opacity-100;
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
    background-color: rgba(0, 0, 0, .40);
}

.club-image-bg {
    @apply w-full h-full object-cover absolute block top-0 left-0;
    //font-family: "object-fit: cover; object-position: center";
}

.club-title {
    @apply relative z-10 ml-[9rem] sm:ml-[15rem] md:ml-[18rem] lg:ml-[25rem] xl:ml-[32.4rem] mb-[1rem];
}

.club-title__name {
    @apply text-[1.7rem] sm:text-[2.5rem] sm:leading-[2.5rem] md:text-[3rem] md:leading-[3.5rem] lg:text-[4rem] lg:leading-[4.5rem] xl:text-[6rem] xl:leading-[6.5rem] text-white;
    font-weight: 700;
}

.club-title__info {
    @apply text-[1rem] sm:text-[1.6rem] md:text-[1.6rem] lg:text-[3rem] text-white flex flex-col gap-[0.4rem];
}
</style>

<template>
    <Head>
        <title>{{ team.name }}</title>
    </Head>
    <div class="club-container">
        <header class="club-header">
            <div class="club-header__logo-container">
                <div class="club-header-card">
                    <div class="club-header-card__slide-bg club-header-card__slide-bg--neutral"></div>
                    <div class="club-header-card__slide-bg"
                         :style="`background-color: var(--${team.sheet_name}-start)`"></div>
                </div>
                <img
                    :src="team.logo"
                    class="club-header__logo"
                >
            </div>
            <div class="club-image">
                <img class="club-image-bg"
                     :src="team.cover"
                     alt="">
            </div>
            <div class="club-title">
                <div class="club-title__name">{{ team.name }}</div>
                <div class="club-title__info">{{ team.city }}</div>
            </div>
        </header>
    </div>
    <div class="container mx-auto px-5 md:px-0">
        <template v-if="have_awards">
            <Spacer/>
            <div class="box">
                <h2 class="box-title">PALMARÉS</h2>
                <div class="grid xl:grid-cols-6 lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">
                    <div class="flex flex-col items-center my-3 md:my-0" v-for="award in team.awards">
                        <p class="py-3 text-6xl font-[Cabin] font-bold">{{ award.image }}</p>
                        <p class="text-2xl">{{ award.season.year }}</p>
                        <p>{{ award.name }}</p>
                    </div>
                </div>
            </div>
        </template>
        <Spacer/>

        <div class="box">
            <h2 class="box-title">PLANTILLA</h2>
            <Roster :players="team.players"/>
        </div>
    </div>
</template>

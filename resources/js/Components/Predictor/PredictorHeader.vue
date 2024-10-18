<template>
    <section class="max-w-6xl mx-auto p-4">
        <header class="mb-10 mt-5">
            <h1 class="text-3xl font-bold text-center">La Quini de {{ tournament.name }}</h1>
            <p class="text-center text-lg text-gray-500">Haz tus predicciones para los partidos de {{
                    tournament.name
                }}
            </p>
            <SubMenu/>
        </header>
    </section>
</template>

<script setup>
import SubMenu from '~/Components/Predictor/SubMenu.vue';

defineProps({
    tournament: {
        type: Object,
        required: true
    }
});
</script>


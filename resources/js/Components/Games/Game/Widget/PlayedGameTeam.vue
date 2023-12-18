<script setup>
defineProps({
    team: {
        type: Object,
        required: true
    },
    score: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <div class="w-5/12 flex flex-col">
        <div class="text-7xl font-sans font-bold text-center mb-3">{{ score }}</div>
        <div class="avatar">
            <div class="w-16 mx-auto">
                <img
                    :src="team.logo"
                    :title="team.name"
                    :alt="team.name">
            </div>
        </div>
    </div>
</template>

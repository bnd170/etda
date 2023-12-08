<script setup>
defineProps({
    team: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="w-5/12 flex flex-col">
        <div class="avatar">
            <div class="w-24 mx-auto">
                <img
                    :src="team.logo"
                    :alt="team.name">
            </div>
        </div>
        <div class="text-lg font-bold text-center mt-3">{{ team.name }}</div>
    </div>
</template>

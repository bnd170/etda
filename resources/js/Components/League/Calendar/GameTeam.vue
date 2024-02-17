<script setup>
import Avatar from "primevue/avatar";

defineProps({
    team: {
        type: Object,
        required: true,
        default: null
    },
    isHome: {
        type: Boolean,
        default: false
    }
})
</script>

<template>
    <div class="flex items-center gap-5" :class="{ 'flex-row-reverse': !isHome}">
        <template v-if="team">
            <span class="font-['Cabin'] hidden lg:block" :class="{ 'text-right': isHome }">{{ team.name }}</span>
            <span class="font-['Cabin'] lg:hidden block" :class="{ 'text-right': isHome }">{{ team.tag }}</span>
            <Avatar :image="team.logo" :alt="team.name"/>
        </template>
        <template v-else>
            <span class="font-['Cabin'] hidden lg:block" :class="{ 'text-right': isHome }">Por confirmar</span>
            <span class="font-['Cabin'] lg:hidden block" :class="{ 'text-right': isHome }">TBA</span>
            <Avatar label="?"/>
        </template>
    </div>
</template>

<style scoped>

</style>

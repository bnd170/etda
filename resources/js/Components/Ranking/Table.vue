<script setup>
defineProps({
    ranking: {
        type: Array,
        required: true
    },
    short: {
        type: Boolean,
        required: false,
        default: false
    }
})
</script>

<template>
    <table class="table" ranking="">
        <thead class="text-lg font-bold">
        <tr>
            <th></th>
            <th>PT</th>
            <th>PJ</th>
            <th v-if="!short" class="hidden md:table-cell">PG</th>
            <th v-if="!short" class="hidden md:table-cell">PE</th>
            <th v-if="!short" class="hidden md:table-cell">PP</th>
            <th v-if="!short" class="hidden xl:table-cell">GF</th>
            <th v-if="!short" class="hidden xl:table-cell">GC</th>
            <th v-if="!short" class="hidden xl:table-cell">DG</th>
        </tr>
        </thead>
        <tbody class="text-lg">
        <tr v-for="ranking in ranking" :key="ranking.id">
            <td>
                <a :href="route('national-league.teams.club', {'sheet_name': ranking.team.sheet_name})">
                    <div class="flex items-center gap-3">
                        <div class="avatar">
                            <div class="mask mask-squircle" :class="{'w-16 h-16': !short, 'w-10 h-10': short}">
                                <img
                                    class="w-full h-full"
                                    :src="ranking.team.logo"
                                    :alt="`${ranking.team.name} logo`"/>
                            </div>
                        </div>
                        <div :class="{'hidden': short}">
                            <div class="font-bold">{{ ranking.team.name }}</div>
                            <div class="opacity-50">{{ ranking.team.city }}</div>
                        </div>
                    </div>
                </a>
            </td>
            <td class="font-bold text-lg">{{ ranking.points }}</td>
            <td>{{ ranking.total_games }}</td>
            <td v-if="!short" class="hidden md:table-cell">{{ ranking.wins }}</td>
            <td v-if="!short" class="hidden md:table-cell">{{ ranking.ties }}</td>
            <td v-if="!short" class="hidden md:table-cell">{{ ranking.losses }}</td>
            <td v-if="!short" class="hidden xl:table-cell">{{ ranking.goals_for }}</td>
            <td v-if="!short" class="hidden xl:table-cell">{{ ranking.goals_against }}</td>
            <td v-if="!short" class="hidden xl:table-cell">{{ ranking.goal_differential }}</td>
        </tr>
        </tbody>

    </table>
</template>

<style>
.avatar img {
    @apply object-contain !important;
}
</style>

<script setup>
defineProps({
    ranking: {
        type: Array,
        required: true
    },
})
</script>

<template>
    <div class="bg-white rounded-2xl py-5 px-3">
        <table class="table" ranking="">
            <thead class="text-lg font-bold">
            <tr>
                <th></th>
                <th>PT</th>
                <th>PJ</th>
                <th class="hidden md:table-cell">PG</th>
                <th class="hidden md:table-cell">PE</th>
                <th class="hidden md:table-cell">PP</th>
                <th class="hidden xl:table-cell">GF</th>
                <th class="hidden xl:table-cell">GC</th>
                <th class="hidden xl:table-cell">DG</th>
            </tr>
            </thead>
            <tbody class="text-lg">
            <tr v-for="ranking in ranking" :key="ranking.id">
                <td>
                    <a :href="route('national-league.teams.club', {'sheet_name': ranking.team.sheet_name})">
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-16 h-16">
                                    <img
                                        class="w-full h-full"
                                        :src="ranking.team.logo"
                                        :alt="`${ranking.team.name} logo`"/>
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ ranking.team.name }}</div>
                                <div class="opacity-50">{{ ranking.team.city }}</div>
                            </div>
                        </div>
                    </a>
                </td>
                <td class="font-bold text-lg">{{ ranking.points }}</td>
                <td>{{ ranking.total_games }}</td>
                <td class="hidden md:table-cell">{{ ranking.wins }}</td>
                <td class="hidden md:table-cell">{{ ranking.ties }}</td>
                <td class="hidden md:table-cell">{{ ranking.losses }}</td>
                <td class="hidden xl:table-cell">{{ ranking.goals_for }}</td>
                <td class="hidden xl:table-cell">{{ ranking.goals_against }}</td>
                <td class="hidden xl:table-cell">{{ ranking.goal_differential }}</td>
            </tr>
            </tbody>

        </table>
    </div>
</template>

<style>
.avatar img {
    @apply object-contain !important;
}
</style>

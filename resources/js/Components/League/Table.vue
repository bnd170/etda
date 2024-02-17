<script setup>
import Avatar from 'primevue/avatar';

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
    <table class="table w-full">
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
        <tr v-for="(ranking, index) in ranking" :key="ranking.id">
            <td :class="{'playoff': index < 4}">
                <a :href="route('national-league.teams.club', {'sheet_name': ranking.team.sheet_name})">
                    <div class="flex items-center gap-3">
                        <Avatar :image="ranking.team.logo" :size="short ? 'normal' : 'xlarge'" class="ml-2 my-2" />
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

    <div class="flex flex-row justify-end items-center gap-3 mt-5 border-t border-gray-900 pt-5">
        <div class="w-3 h-3 rounded-full bg-green-500"></div>
        <div>Playoff</div>
    </div>
</template>

<style>
table th {
    @apply text-gray-500 text-left min-w-[3rem];
}
table tr:not(:last-child), table th {
    @apply border-b dark:border-gray-950 border-gray-200 py-3;
}
.avatar img {
    @apply object-contain !important;
}

.playoff {
    @apply border-l-4 border-green-500/50 !important;
}
</style>

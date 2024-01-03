<script setup>

defineProps({
    top_stat: {
        type: Object,
        required: true
    },
    stat_name: {
        type: String,
        required: true
    },
    is_percentage: {
        type: Boolean,
        required: false,
        default: false
    }
})

</script>

<template>
    <section>
        <div class="font-[Cabin] text-xl font-extrabold mb-3 text-center">{{ stat_name }}</div>
        <div class="rounded-xl border border-neutral-200 font-[Cabin] overflow-hidden">
            <div class="flex flex-row items-center border-t border-neutral-200" :class="{'border-t-0': index === 0}" v-for="(team, index) in top_stat">
                <div v-if="index === 0" class="flex flex-row w-full px-3 py-5 first" :class="`${team.sheet_name}`">
                    <div class="flex flex-col flex-grow">
                        <p class="font-extrabold">1</p>
                        <p class="lg:block hidden font-bold text-xl">{{team.name}}</p>
                        <p class="block lg:hidden font-bold text-xl">{{team.tag}}</p>
                        <p class="text-3xl font-extrabold">{{ team.stat }}<template v-if="is_percentage">%</template></p>
                    </div>
                    <div class="">
                        <img class="w-24" :src="team.logo"/>
                    </div>
                </div>
                <div v-else class="flex flex-row w-full items-center gap-3 py-1.5 px-3">
                    <p class="text-neutral-900/50 mr-1">{{ index + 1}}</p>
                    <div class="font-[Overpass] flex-grow flex flex-row items-center gap-2">
                        <img class="w-8" :src="team.logo"/>
                        <p class="lg:block hidden">{{team.name}}</p>
                        <p class="block lg:hidden">{{team.tag}}</p>
                    </div>
                    <div class="text-lg font-extrabold">
                        {{ team.stat }}<template v-if="is_percentage">%</template>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.first.tenerife {
    background-image: linear-gradient(90deg, var(--tenerife-start) 0%, var(--tenerife-end) 100%);
    color: var(--tenerife-text);
}
.first.disport {
    background-image: linear-gradient(90deg, var(--disport-start) 0%, var(--disport-end) 100%);
    color: var(--disport-text);
}
.first.segunda_parte {
    background-image: linear-gradient(90deg, var(--segunda_parte-start) 0%, var(--segunda_parte-end) 100%);
    color: var(--segunda_parte-text);
}
.first.eibar {
    background-image: linear-gradient(90deg, var(--eibar-start) 0%, var(--eibar-end) 100%);
    color: var(--eibar-text);
}
.first.hercules {
    background-image: linear-gradient(90deg, var(--hercules-start) 0%, var(--hercules-end) 100%);
    color: var(--hercules-text);
}
.first.amdda {
    background-image: linear-gradient(90deg, var(--amdda-start) 0%, var(--amdda-end) 100%);
    color: var(--amdda-text);
}
.first.extremadura {
    background-image: linear-gradient(90deg, var(--extremadura-start) 0%, var(--extremadura-end) 100%);
    color: var(--extremadura-text);
}
</style>

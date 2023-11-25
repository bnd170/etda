<template>
    <div class="card w-96 mx-auto bg-base-300/30 hover:shadow-xl text-wh">
        <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-base-100"
             src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
        <div class="text-center mt-2 text-3xl font-medium">{{ player.name }}</div>
        <div class="text-center font-normal text-lg">{{ player.position }}</div>

        <div class="flex p-4">
            <div class="w-1/2 text-center">
                <h3>Dorsal</h3>
                <span class="font-bold text-xl">{{ player.number }}</span>
            </div>
            <div class="w-0 border border-base-300"></div>
            <div class="w-1/2 text-center">
                <h3>Edad</h3>
                <span class="font-bold text-xl">{{ player.age }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    player: {
        type: Object,
        required: true
    },
})
</script>

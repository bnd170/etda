<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-if="message">
        <p class="dark:text-red-400 text-red-600">
            {{ message }}
        </p>
    </div>
</template>

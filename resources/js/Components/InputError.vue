<script setup>
import Message from "primevue/message";
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-if="message">
        <Message severity="error" :closable="false">
            {{ message }}
        </Message>
    </div>
</template>

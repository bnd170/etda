<script setup>
import Button from 'primevue/button';

defineProps({
    disabled: {
        type: Boolean,
        default: false,
    },
    type: {
        type: String,
        default: 'submit',
    },
})
</script>
<template>
    <Button
        :type="type"
        :disabled="disabled"
    >
        <slot />
    </Button>
</template>

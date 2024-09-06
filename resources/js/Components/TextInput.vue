<script setup>
import InputText        from 'primevue/inputtext';
import InputLabel       from "@/Components/InputLabel.vue";

const model = defineModel({
    type: String,
    required: true,
});

const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    autofocus: {
        type: Boolean,
        default: false,
    },
    size: {
        type: String,
        default: 'large',
    },
    required: {
        type: Boolean,
        default: false,
    },
    type: {
        type: String,
        default: 'text',
    },
    autocomplete: {
        type: String,
        default: 'off',
    },
});
</script>

<template>
    <InputLabel>
        {{ label }}
        <InputText
            :size="size"
            :type="type"
            v-model="model"
            ref="input"
            :required="required"
            :autofocus="autofocus"
            :autocomplete="autocomplete"
            class="w-full"
            :toggleMask="true"
        />
    </InputLabel>
</template>

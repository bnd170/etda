<script setup>
import {onMounted, ref} from 'vue';
import Password         from 'primevue/password';
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
    toggleMask: {
        type: Boolean,
        default: true,
    },
    feedback: {
        type: Boolean,
        default: true,
    },
});

</script>

<template>
    <InputLabel>
        {{ label }}
        <Password
            :size="size"
            :type="type"
            v-model="model"
            ref="input"
            :required="required"
            :autofocus="autofocus"
            :toggleMask="true"
            :feedback="false"
            class="w-full"
        />
    </InputLabel>
</template>

<script setup>
import Checkbox   from 'primevue/checkbox';
import InputLabel from "@/Components/InputLabel.vue";

const model = defineModel({
    type: Boolean,
    required: true,
});

const props = defineProps({
    label: {
        type: String,
        required: true
    },
    name: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <div class="flex items-end gap-2 ">
        <Checkbox
            binary
            :inputId="label"
            :name="name"
            v-model="model"

        />
        <InputLabel :for="label">{{ label }}</InputLabel>
    </div>
</template>

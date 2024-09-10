<script setup>
import InputError             from '@/Components/InputError.vue';
import PrimaryButton          from '@/Components/PrimaryButton.vue';
import TextInput              from '@/Components/TextInput.vue';
import {Head, useForm}        from '@inertiajs/vue3';
import DefaultContentCentered from "@/Layout/DefaultContentCentered.vue";
import Card                   from "primevue/card";

defineOptions({
    layout: DefaultContentCentered
})

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password"/>
    <section class="container mx-auto">
        <form @submit.prevent="submit">
            <Card class="md:max-w-[70%] xl:max-w-[35vw] 2xl:max-w-[40%] max-w-full md:mx-auto mx-10"
                  pt:content:class="flex flex-col gap-y-5 py-10">
                <template #title>
                    <h1>Reestablecer contraseña</h1>
                </template>

                <template #subtitle>
                    Introduce tu nueva contraseña.
                </template>

                <template #content>
                    <TextInput
                        label="Correo electrónico"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email"/>

                    <TextInput
                        label="Nueva contraseña"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password"/>

                    <TextInput
                        label="Confirma la nueva contraseña"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                </template>

                <template #footer>
                    <PrimaryButton type="submit" class="w-full" :loading="form.processing">
                        Reestablecer contraseña
                    </PrimaryButton>
                </template>
            </Card>
        </form>
    </section>
</template>

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

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="He olvidado mi contraseña"/>

    <section class="container mx-auto">
        <form @submit.prevent="submit">
            <Card class="md:max-w-[70%] xl:max-w-[35vw] 2xl:max-w-[40%] max-w-full md:mx-auto mx-10"
                  pt:content:class="py-10">
                <template #title>
                    <h1>He olvidado mi contraseña</h1>
                </template>

                <template #subtitle>
                    ¿Has olvidado tu contraseña? No hay problema. <br> Solo dinos tu dirección de correo electrónico y te
                    enviaremos
                    un
                    enlace para restablecer tu contraseña.
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
                </template>

                <template #footer>
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>
                    <PrimaryButton type="submit" class="w-full" :loading="form.processing">
                        Enviar enlace de restablecimiento de contraseña
                    </PrimaryButton>
                </template>
            </Card>
        </form>
    </section>
</template>

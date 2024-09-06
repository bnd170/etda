<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';

import InputText     from 'primevue/inputtext';
import Password      from 'primevue/password';
import Card          from 'primevue/card';
import Message       from 'primevue/message';
import Logo          from "@/Components/Layout/Logo.vue";
import InputError    from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    processing: false,
});


const submit = () => {
    form.processing = true;
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation', 'processing'),
    });
};
</script>

<template>
    <Head title="Crea tu cuenta"/>
    <section class="flex items-center flex-col justify-center min-h-screen min-w-[100vw] overflow-hidden">
        <Card>
            <template #title>
                <header class="flex flex-col relative">
                    <a href="/"
                       class="flex flex-col pl-5 text-2xl font-[Cabin] w-full text-center absolute -top-[70px]">
                        <span class="mx-auto bg-white p-4 rounded-full mb-2">
                            <Logo class="w-16 inline text-surface-800"/>
                        </span>
                        El Talón de Aquiles
                    </a>
                    <h3 class="mt-[120px] box-title">Crea tu cuenta</h3>
                </header>
            </template>
            <template #content>
                <form @submit.prevent="submit">
                    <label
                        class="flex flex-col text-surface-900 dark:text-surface-0 text-lg font-medium mb-2">
                        Nombre
                        <InputText
                            id="name"
                            type="text"
                            class="w-full md:w-[25rem] mb-8"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <InputError class="mt-2" :message="form.errors.name"/>
                    </label>

                    <label
                        class="flex flex-col text-surface-900 dark:text-surface-0 text-lg font-medium mb-2">
                        Correo electrónico
                        <InputText type="email" placeholder="mvp@eltalondeaquiles.es" class="w-full md:w-[25rem] mb-2"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   v-model="form.email"
                        />
                        <InputError class="mt-2" :message="form.errors.email"/>
                    </label>

                    <label class="flex flex-col text-surface-900 dark:text-surface-0 font-medium text-lg mb-5">
                        Contraseña
                        <Password v-model="form.password"
                                  class="mt-1 block w-full w-full md:w-[25rem]"
                                  required
                                  autocomplete="new-password"
                                  placeholder="Shhh... no la compartas"
                                  :toggleMask="true"
                                  :feedback="false"/>
                        <InputError class="mt-2" :message="form.errors.password"/>
                    </label>


                    <label class="flex flex-col text-surface-900 dark:text-surface-0 font-medium text-lg mb-2">
                        Confirma la contraseña
                        <Password v-model="form.password_confirmation"
                                  class="mt-1 block w-full"
                                  required
                                  autocomplete="new-password"
                                  placeholder="Shhh... no la compartas"
                                  :toggleMask="true"
                                  :feedback="false"/>
                        <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                    </label>

                    <PrimaryButton class="w-full mt-12 font-bold text-xl" :class="{ 'opacity-25': form.processing }"
                                   :disabled="form.processing">
                        Crear cuenta
                    </PrimaryButton>
                </form>
            </template>
        </Card>

        <Message severity="info" class="mt-5" :closable="false">
            <Link :href="route('login')">Si ya tienes una cuenta, inicia sesión aquí</Link>
        </Message>
    </section>
</template>


<style scoped>
</style>

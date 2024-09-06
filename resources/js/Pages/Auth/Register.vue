<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';

import InputText     from 'primevue/inputtext';
import Password      from 'primevue/password';
import Logo          from "@/Components/Layout/Logo.vue";
import InputError    from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref}         from "vue";
import AuthBase      from "@/Pages/Auth/AuthBase.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const processing = ref(false);


const submit = () => {
    processing.value = true;
    form.post(route('register'));
};
</script>

<template>
    <Head title="Crea tu cuenta"/>
    <AuthBase>
        <template #header>
            <a href="/"
               class="flex flex-col pl-5 text-2xl font-[Cabin] w-full text-center absolute -top-[70px]">
                        <span class="mx-auto bg-white p-4 rounded-full mb-2">
                            <Logo class="w-16 inline text-surface-800"/>
                        </span>
                El Talón de Aquiles
            </a>
            <h3 class="mt-[120px] box-title">Crea tu cuenta</h3>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <label
                    class="flex flex-col text-surface-900 dark:text-surface-0 text-lg font-medium mb-2">
                    Nombre
                    <InputText
                        id="name"
                        type="text"
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

                <PrimaryButton class="w-full mt-12 font-bold text-xl" :class="{ 'opacity-25': processing }"
                               :disabled="processing">
                    Crear cuenta
                </PrimaryButton>
            </form>
        </template>

        <template #message>
            <Link :href="route('login')">Si ya tienes una cuenta, inicia sesión aquí</Link>
        </template>
    </AuthBase>
</template>

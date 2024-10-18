<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';

import InputText     from 'primevue/inputtext';
import Password      from 'primevue/password';
import Checkbox      from 'primevue/checkbox';
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
    privacy_policy: false,
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

                <label class="flex flex-row gap-3 text-surface-900 dark:text-surface-0 font-medium text-lg mb-2">
                    <Checkbox v-model="form.privacy_policy" required/>
                    <span>
                        He leído y acepto la <Link href="/politica-de-privacidad"
                                                                  class="text-primary-500">política de privacidad</Link></span>
                </label>
                <InputError class="mt-2" :message="form.errors.password_confirmation"/>

                <PrimaryButton class="w-full mt-12 font-bold text-xl" :class="{ 'opacity-25': processing }"
                               :disabled="processing">
                    Crear cuenta
                </PrimaryButton>
                <!--                <div class="flex w-full items-center rounded-full">-->
                <!--                    <div class="flex-1 border-b border-gray-300/30"></div>-->
                <!--                    <span class="px-8 py-6 text-gray-300">O utiliza tus RRSS</span>-->
                <!--                    <div class="flex-1 border-b border-gray-300/30"></div>-->
                <!--                </div>-->
                <!--                <a :href="route('auth.social.redirect')" class="flex flex-row items-center justify-center rounded bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] p-2 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg">-->
                <!--                    <span class="[&>svg]:h-8 [&>svg]:w-8 mr-3"><svg-->
                <!--                            xmlns="http://www.w3.org/2000/svg"-->
                <!--                            fill="currentColor"-->
                <!--                            viewBox="0 0 448 512">-->
                <!--                          &lt;!&ndash;!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. &ndash;&gt;-->
                <!--                          <path-->
                <!--                              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>-->
                <!--                        </svg></span>-->
                <!--                    <span>Instagram</span>-->
                <!--                </a>-->
            </form>
        </template>

        <template #message>
            <Link :href="route('login')">Si ya tienes una cuenta, inicia sesión aquí</Link>
        </template>
    </AuthBase>
</template>

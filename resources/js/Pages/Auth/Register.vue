<script setup>
import {Head, useForm} from '@inertiajs/vue3';

import InputText  from 'primevue/inputtext';
import Password   from 'primevue/password';
import Card       from 'primevue/card';
import Button     from 'primevue/button';
import Logo       from "@/Components/Layout/Logo.vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    processing: false,
});


const submit = () => {
    console.log(route('register'));
    form.processing = true;
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation', 'processing'),
    });
};
</script>

<template>
    <Head title="Register"/>
    <section class="flex items-center justify-center min-h-screen min-w-[100vw] overflow-hidden">
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
                    <h3 class="mt-[120px] box-title">Accede a tu cuenta</h3>
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
                            class="w-full md:w-[30rem] mb-8"
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
                        <InputText type="email" placeholder="mvp@eltalondeaquiles.es" class="w-full md:w-[30rem] mb-2"
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
                                  id="password"
                                  type="password"
                                  class="mt-1 block w-full"
                                  required
                                  autocomplete="new-password"
                                  placeholder="Shhh... no la compartas" :toggleMask="true" :feedback="false"/>
                        <InputError class="mt-2" :message="form.errors.password"/>
                    </label>


                    <label class="flex flex-col text-surface-900 dark:text-surface-0 font-medium text-lg mb-2">
                        Confirma la contraseña
                        <Password v-model="form.password_confirmation"
                                  id="password"
                                  type="password"
                                  class="mt-1 block w-full"
                                  required
                                  autocomplete="new-password"
                                  placeholder="Shhh... no la compartas" :toggleMask="true" :feedback="false"/>
                        <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                    </label>

                    <Button type="submit" label="Inicia sesión" class="w-full mt-5"
                            :class="{ 'opacity-25': form.processing }" :disabled="form.processing"></Button>
                </form>
                <p class="border-top-2  mt-8 w-full font-medium no-underline ml-2 text-center cursor-pointer text-gray-300">
                    🤔 He olvidado mi contraseña</p>
            </template>
        </Card>
    </section>
</template>


<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
</style>

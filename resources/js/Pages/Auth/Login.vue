<script setup>
import Checkbox              from '@/Components/Checkbox.vue';
import InputError            from '@/Components/InputError.vue';
import PrimaryButton         from '@/Components/PrimaryButton.vue';
import TextInput             from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import Card                  from 'primevue/card';
import Message               from 'primevue/message';
import Logo                  from "@/Components/Layout/Logo.vue";
import PasswordInput         from "@/Components/PasswordInput.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Accede a tu cuenta"/>
    <section class="flex items-center flex-col justify-center min-h-screen min-w-[100vw] overflow-hidden">
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
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
                    <div>
                        <TextInput
                            type="email"
                            label="Correo electrónico"
                            class="mt-1 block w-full text-xl"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email"/>
                    </div>

                    <div class="mt-4">
                        <PasswordInput
                            label="Contraseña"
                            type="password"
                            class="mt-1 block w-full text-xl"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password"/>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <Checkbox name="remember" v-model="form.remember" label="Recuérdame" checked />
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                        >🤔 He olvidado mi contraseña
                        </Link>

                    </div>
                    <PrimaryButton class="w-full mt-12 font-bold text-xl" :class="{ 'opacity-25': form.processing }"
                                   :disabled="form.processing">
                        Iniciar sesión
                    </PrimaryButton>
                </form>
            </template>
        </Card>
        <Message severity="info" class="mt-5" :closable="false">
            <Link :href="route('register')" class="w-full" >
                Si no tienes una cuenta, crea una aquí
            </Link>
        </Message>
    </section>

</template>

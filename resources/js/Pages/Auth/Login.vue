<script setup>
import Checkbox              from '@/Components/Checkbox.vue';
import InputError            from '@/Components/InputError.vue';
import PrimaryButton         from '@/Components/PrimaryButton.vue';
import TextInput             from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import AuthBase              from "@/Pages/Auth/AuthBase.vue";
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

    <AuthBase>
        <template #header>
            <a href="/"
               class="flex flex-col pl-5 text-2xl font-[Cabin] w-full text-center absolute -top-[70px]">
                    <span class="mx-auto bg-white p-4 rounded-full mb-2">
                        <Logo class="w-16 inline text-surface-800"/>
                    </span>
                El Talón de Aquiles
            </a>
            <h3 class="mt-[120px] box-title">Accede a tu cuenta</h3>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div>
                    <TextInput
                        type="email"
                        label="Correo electrónico"
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
                    <Checkbox name="remember" v-model="form.remember" label="Recuérdame"/>
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
        <template #message>
            <Link :href="route('register')" class="w-full">
                Si no tienes una cuenta, crea una aquí
            </Link>
        </template>
    </AuthBase>
</template>

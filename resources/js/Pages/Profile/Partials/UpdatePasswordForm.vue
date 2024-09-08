<script setup>
import InputError    from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PasswordInput from '@/Components/PasswordInput.vue';
import {useForm}     from '@inertiajs/vue3';
import {ref}         from 'vue';
import Card          from 'primevue/card';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <form @submit.prevent="updatePassword">
        <Card pt:content:class="flex flex-col gap-y-5">
            <template #title>
                <header>
                    <h2>Cambiar contraseña</h2>
                </header>
            </template>
            <template #subtitle>Actualiza tu contraseña.</template>

            <template #content>
                <div>
                    <PasswordInput
                        label="Contraseña actual"
                        ref="currentPasswordInput"
                        v-model="form.current_password"
                        autocomplete="current-password"
                        size="large"
                    />
                    <InputError :message="form.errors.current_password" class="mt-2"/>
                </div>

                <div>
                    <PasswordInput
                        label="Nueva contraseña"
                        ref="passwordInput"
                        v-model="form.password"
                        autocomplete="new-password"
                    />
                    <InputError :message="form.errors.password" class="mt-2"/>
                </div>

                <div>
                    <PasswordInput
                        label="Confirma la nueva contraseña"
                        v-model="form.password_confirmation"
                        autocomplete="new-password"
                    />

                    <InputError :message="form.errors.password_confirmation" class="mt-2"/>
                </div>
            </template>
            <template #footer>
                <div class="flex flex-row items-center">
                    <PrimaryButton :disabled="form.processing" class="mr-5">Cambiar contraseña</PrimaryButton>
                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm">✅ Contraseña cambiada.</p>
                    </Transition>
                </div>
            </template>
        </Card>
    </form>
</template>

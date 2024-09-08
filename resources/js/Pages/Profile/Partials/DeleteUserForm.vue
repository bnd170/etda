<script setup>
import DangerButton    from '@/Components/DangerButton.vue';
import InputError      from '@/Components/InputError.vue';
import Dialog          from 'primevue/dialog';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PasswordInput   from '@/Components/PasswordInput.vue';
import Card            from 'primevue/card';
import {useForm}       from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <Card>
        <template #title>
            <header>
                <h2>Eliminar mi cuenta</h2>
            </header>
        </template>
        <template #subtitle>
            Esta acción es irreversible y eliminará todos tus datos y recursos permanentemente.
        </template>

        <template #footer>
            <DangerButton @click="confirmUserDeletion">
                Deseo eliminar mi cuenta
            </DangerButton>
        </template>
    </Card>
    <Dialog v-model:visible="confirmingUserDeletion" :style="{ width: '35rem' }" modal
            header="¿Estás seguro que deseas eliminar tu cuenta?">
        <div class="flex flex-col gap-5">
            <p>
                Al eliminar tu cuenta, todos tus datos y recursos serán eliminados permanentemente. Por favor, introduce
                tu
                contraseña para confirmar que deseas eliminar tu cuenta.
            </p>

            <div>
                <PasswordInput
                    label="Escribe tu contraseña para confirmar"
                    ref="passwordInput"
                    v-model="form.password"
                    placeholder="Password"
                    @keyup.enter="deleteUser"
                />

                <InputError :message="form.errors.password" class="mt-2"/>
            </div>


            <div class="flex justify-end gap-2">
                <SecondaryButton @click="closeModal">Me he arrepentido</SecondaryButton>

                <DangerButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="deleteUser"
                >
                    Eliminar cuenta permanentemente
                </DangerButton>
            </div>
        </div>
    </Dialog>
</template>

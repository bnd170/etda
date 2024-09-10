<script setup>
import {computed}             from 'vue';
import PrimaryButton          from '@/Components/PrimaryButton.vue';
import {Head, Link, useForm}  from '@inertiajs/vue3';
import DefaultContentCentered from "@/Layout/DefaultContentCentered.vue";
import Card                   from "primevue/card";


defineOptions({
    layout: DefaultContentCentered
})

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status==='verification-link-sent');
</script>

<template>
    <Head title="Email Verification"/>

    <section class="container mx-auto">
        <form @submit.prevent="submit">
            <Card class="md:max-w-[70%] xl:max-w-[35vw] 2xl:max-w-[40%] max-w-full md:mx-auto mx-10">
                <template #title>
                    <h3 class="box-title">Por favor, verifica tu dirección de correo electrónico</h3>
                </template>

                <template #content>
                    <p>
                        Gracias por registrarte. Antes de comenzar, por favor verifica tu dirección de correo
                        electrónico
                        haciendo clic en el enlace que te hemos enviado por correo electrónico. Si no has recibido el
                        correo electrónico, te enviaremos otro si haces click en el siguiente botón.
                    </p>

                    <div class="my-4 font-medium text-green-600" v-if="verificationLinkSent">
                        Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.
                    </div>
                </template>
                <template #footer>
                    <div class="mt-4 flex items-center justify-between">
                        <PrimaryButton type="submit" :loading="form.processing">
                            Reenviar correo de verificación
                        </PrimaryButton>
                        <Link
                            :href="route('logout')"
                            method="post"
                        >Log Out
                        </Link>
                    </div>
                </template>
            </Card>
        </form>
    </section>
</template>

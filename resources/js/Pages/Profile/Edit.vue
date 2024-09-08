<script setup>
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import Default                      from "~/Layout/Default.vue";
import {Head}                       from "@inertiajs/vue3";
import UpdatePasswordForm           from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import DeleteUserForm               from "@/Pages/Profile/Partials/DeleteUserForm.vue";

defineOptions({layout: Default});

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Mi cuenta"/>
    <section class="max-w-2xl mx-auto flex flex-col gap-10">
        <h1 class="text-2xl">Mi perfil</h1>
        <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
        />
        <UpdatePasswordForm/>

        <DeleteUserForm/>
    </section>
</template>

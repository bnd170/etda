<script setup>

import Message from "primevue/message";
import Card    from "primevue/card";
</script>

<template>
    <div class="min-h-screen flex flex-col md:flex-row bg-pitch">
        <div class="hidden md:block w-full md:w-1/2 bg-navy-900 p-8 flex items-center justify-center">
            <div class="w-full max-w-md"></div>
        </div>

        <div class="md:w-1/2">
            <div class="h-full w-full bg-black/85 flex items-center justify-center">
                <section class="flex items-center flex-col justify-center min-h-screen overflow-hidden">
                    <Card class="w-full">
                        <template #title>
                            <header class="flex flex-col relative">
                                <slot name="header"/>
                            </header>
                        </template>
                        <template #content>
                            <slot name="content"/>
                        </template>
                    </Card>

                    <Message severity="info" class="mt-5" :closable="false">
                        <slot name="message"/>
                    </Message>
                </section>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-pitch {
        background-image: url('/img/fondo-auth-new.webp');
        @apply bg-cover bg-center;
    }
</style>

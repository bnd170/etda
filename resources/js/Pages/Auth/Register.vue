<script setup>
import {ref} from 'vue';

import InputText from 'primevue/inputtext';
import Password  from 'primevue/password';
import Card      from 'primevue/card';
import Checkbox  from 'primevue/checkbox';
import Button    from 'primevue/button';
import Logo      from "~/Components/Layout/Logo.vue";

const email = ref('');
const password = ref('');
const checked = ref(true);
</script>

<template>
    <section class="flex items-center justify-center min-h-screen min-w-[100vw] overflow-hidden">
        <Card>
            <template #title>
                <header class="flex flex-col relative">
                    <a href="/" class="flex flex-col pl-5 text-2xl font-[Cabin] w-full text-center absolute -top-[70px]">
                        <span class="mx-auto bg-white p-4 rounded-full mb-2">
                            <Logo class="w-16 inline text-surface-800" />
                        </span>
                        El Talón de Aquiles
                    </a>
                    <h3 class="mt-[120px] box-title">Accede a tu cuenta</h3>
                </header>
            </template>
            <template #content>
                <label
                    class="flex flex-col text-surface-900 dark:text-surface-0 text-lg font-medium mb-2">
                    Correo electrónico
                    <InputText type="text" placeholder="mvp@eltalondeaquiles.es" class="w-full md:w-[30rem] mb-8"
                               v-model="email"/>
                </label>


                <label class="flex flex-col text-surface-900 dark:text-surface-0 font-medium text-lg mb-2">
                    Contraseña
                    <Password v-model="password" placeholder="Shhh... no la compartas" :toggleMask="true"
                              class="mb-4 w-full"
                              :feedback="false"/>
                </label>


                <div class="flex items-center justify-between mt-2 mb-8 gap-8">
                    <div class="flex items-center">
                        <Checkbox v-model="checked" id="rememberme1" binary class="mr-2"></Checkbox>
                        <label for="rememberme1">No cerrar sesión</label>
                    </div>
                </div>
                <Button label="Inicia sesión" class="w-full" as="router-link" to="/"></Button>
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

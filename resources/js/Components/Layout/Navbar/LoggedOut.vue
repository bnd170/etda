<template>
    <a v-ripple
       :href="route('login')"
       class="flex align-items-center cursor-pointer pl-2 py-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
        ⚽ Iniciar sesión
    </a>
    <a v-ripple
       :href="route('register')"
       class="flex align-items-center cursor-pointer pl-2 py-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
        🥅 Crear cuenta
    </a>
</template>

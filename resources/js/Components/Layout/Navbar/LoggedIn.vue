<template>
    <h2 class=" mb-4 text-lg">👋 Hola, {{ $page.props.auth.user.name }}</h2>
    <fieldset
        class="block px-4 pt-1 inline-size-min rounded-md border border-surface-200 dark:border-surface-700 bg-surface-0 dark:bg-surface-900 text-surface-700 dark:text-surface-0/80"
        data-pc-name="fieldset" data-pc-section="root">
        <legend
            class="font-bold leading-none p-2 rounded-md text-surface-700 dark:text-surface-0/80 border border-surface-200 dark:border-surface-700 bg-surface-50 dark:bg-surface-900 transition-none"
            data-pc-section="legend">
            <span class="flex items-center justify-center leading-none" data-pc-section="legendtitle">📣 ATENCIÓN 📣</span>
        </legend>
        <div role="region"
             data-pc-section="toggleablecontent">
            <div class="pb-4" data-pc-section="content"><p class="text-sm"><br> Si eres un <b
                class="text-blue-300">deportista</b> de la Liga Nacional o Liga Promesas, ponte en contacto
                con nosotros a través de el siguiente enlace</p></div>
        </div>
    </fieldset>
    <nav class="mt-5">
        <a v-ripple
           :href="route('profile.edit')"
           class="flex align-items-center cursor-pointer pl-2 py-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
            <span class="text-gray-500">📋 Editar perfil</span>
        </a>
        <form :action="route('logout')" method="post" class="w-full">
            <input type="hidden" name="_token" :value="$page.props.csrf_token">
            <button type="submit"
                    class="w-full flex align-items-center cursor-pointer pl-2 py-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                <span class="text-gray-500">❌ Cerrar sesión</span>
            </button>
        </form>
    </nav>
</template>

<script setup>
</script>

<template>
    <section class="overflow-y-auto pt-16 px-2 bg-white dark:bg-surface-950 h-full">
        <header class="flex flex-col h-full justify-between">
            <nav class="">

                <a v-ripple :href="route('national-league.news')"
                   class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <Image src="/img/liga-logo.webp" alt="Liga nacional" width="32" class="mr-3"/>
                    <span class="font-medium"><a>Liga Nacional</a></span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <span class="font-medium text-gray-500"><a>Y proximamente...</a></span>
                </a>

                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Liga promesas</span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional masculina</span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional femenina</span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional SUB-19</span>
                </a>


                <a v-ripple :href="route('podcast.episodes')"
                   class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <Image src="/img/spotify.webp" alt="Liga nacional" width="32" class="mr-3"/>
                    <span class="font-medium"><a>El podcast</a></span>
                </a>

            </nav>
            <section class="flex flex-col mb-5 px-2">
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
            </section>
        </header>
    </section>
</template>

<style>
section > header > nav > .menu-item {
    @apply flex items-center cursor-pointer p-3 rounded transition duration-150 ;
}

section > header > nav > .p-fieldset-legend {
    @apply p-1;
}
</style>
<script setup>
import Image    from 'primevue/image';
import Fieldset from 'primevue/fieldset';
import Header   from "@/Components/League/Header.vue";
</script>

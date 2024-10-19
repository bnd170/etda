<template>
    <footer class="p-10 bg-gradient-to-l from-slate-50 to-neutral-200 dark:from-surface-950/30 dark:to-surface-950">
        <section class="container mx-auto grid grid-cols-3">
            <nav class="flex flex-col space-y-2">
                <p class="text-xs border-b-2 dark:border-surface-500 border-surface-600 w-2/3 uppercase mb-5 opacity-75">Conócenos</p>
                <a :href="route('static.about-us.index')" class="link link-hover">El proyecto</a>
                <a href="mailto:hola@eltalondeaquiles.es" class="link link-hover">Contacto</a>
            </nav>
            <nav class="flex flex-col space-y-2">
                <p class="text-xs border-b-2 dark:border-surface-500 border-surface-600 w-2/3 uppercase mb-5 opacity-75">Mapa web</p>
                <a :href="route('podcast.episodes')" class="link link-hover">El podcast</a>
                <a :href="route('national-league.news')" class="link link-hover">Noticias #LNF7PC</a>
                <a :href="route('predictor.index', {'slug': 'ifcpf-world-cup-salou-2024'})" class="link link-hover">La Quini de Aquiles</a>
            </nav>
        </section>
        <section class="container mx-auto pt-6 mt-16 flex justify-center space-x-5 ">
            <a :href="route('static.privacy.index')" class="link link-hover">Privacidad</a>
            <a href="#" class="link link-hover text-gray-500">Cookies</a>
            <a href="#" class="link link-hover text-gray-500">Términos y condiciones</a>
        </section>
    </footer>
</template>
<script setup>
</script>

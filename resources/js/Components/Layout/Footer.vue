<template>
    <footer class="p-10 bg-surface-200 dark:bg-surface-950">
        <section class="container mx-auto grid grid-cols-3">
            <nav class="flex flex-col">
                <p class="text-lg mb-5">Conócenos</p>
                <a :href="route('static.about-us.index')" class="link link-hover">El proyecto</a>
                <a href="mailto:hola@eltalondeaquiles.es" class="link link-hover">Contacto</a>
            </nav>
        </section>
        <section class="container mx-auto pt-6 mt-16 flex justify-center space-x-5 border-t-2 dark:border-surface-600/80 border-surface-400/80">
            <a :href="route('static.privacy.index')" class="link link-hover">Privacidad</a>
            <a href="#" class="link link-hover text-gray-500">Cookies</a>
            <a href="#" class="link link-hover text-gray-500">Términos y condiciones</a>
        </section>
    </footer>
</template>
<script setup>
</script>

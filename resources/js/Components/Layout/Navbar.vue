<template>
    <div class="navbar bg-base-100">
        <a class="btn btn-ghost text-xl" href="/">El Talón de Alquiles</a>
        <ul class="menu lg:menu-horizontal">
            <li><a :href="route('national-league.index')">Liga Nacional</a></li>
            <li><a>Liga Promesas (Próximamente)</a></li>
        </ul>
    </div>
</template>
<script setup>
</script>

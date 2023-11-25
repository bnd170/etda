<template>
    <article v-for="x in 3">
        <div class="card xl:card-side bg-base-100">
            <figure class="max-h-60 xl:max-h-96">
                <img src="https://www.fedpc.org/wp-content/uploads/CARTEL-LNF7-2023-NAVALMORAL-1.png" alt="Album"/>
            </figure>
            <div class="card-body">
                <h2 class="card-title">Navalmoral de la mata pondrá el broche final a la temporada 22/23</h2>
                <div class="card-actions justify-end block">
                    <a class="btn" :href="route('news.post')">Leer más</a>
                </div>
            </div>
        </div>
    </article>
</template>

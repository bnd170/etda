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

                <a v-ripple :href="route('predictor.index', {'slug': 'lnf7-1-division-2025'})"
                   class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <svg class="dark:text-white mr-3 animate"
                         xmlns="http://www.w3.org/2000/svg"
                         version="1.1"
                         width="32" height="auto" viewBox="0 0 122 134" preserveAspectRatio="xMidYMid meet"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision;
                         image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd">
                    <g><path style="opacity:0.65" fill="currentColor" d="M 55.5,1.5 C 56.8321,11.6447 57.4987,22.1447 57.5,33C 57.3333,43.5 57.1667,54 57,64.5C 39.3333,74.8333 21.6667,85.1667 4,95.5C 3.16691,74.1589 3.33358,52.8255 4.5,31.5C 21.7277,21.7257 38.7277,11.7257 55.5,1.5 Z M 34.5,28.5 C 35.8238,39.3404 35.8238,50.3404 34.5,61.5C 32.6675,62.2485 31.0009,63.2485 29.5,64.5C 28.8333,56.5 28.1667,48.5 27.5,40.5C 26.8333,40.8333 26.1667,41.1667 25.5,41.5C 24.1667,39.1667 24.1667,36.8333 25.5,34.5C 28.7376,32.7247 31.7376,30.7247 34.5,28.5 Z"/></g>
                    <g><path style="opacity:1" fill="currentColor" d="M 63.5,1.5 C 81.7248,10.9492 99.7248,20.9492 117.5,31.5C 118.833,52.8333 118.833,74.1667 117.5,95.5C 99.5373,85.3663 81.704,75.033 64,64.5C 63.5,43.5026 63.3334,22.5026 63.5,1.5 Z M 104.5,71.5 C 102.534,70.5588 100.534,69.5588 98.5,68.5C 96.3222,64.1444 94.1556,59.8111 92,55.5C 87.8462,61.8051 83.3462,61.9718 78.5,56C 82.2703,52.9029 85.2703,49.2362 87.5,45C 84.515,38.5562 82.015,32.0562 80,25.5C 82.3333,27.1667 84.6667,28.8333 87,30.5C 88.2305,33.9606 89.7305,37.2939 91.5,40.5C 93.4829,39.018 95.3163,37.3513 97,35.5C 99.7581,36.7946 102.258,38.4612 104.5,40.5C 101.8,44.1916 99.1329,47.8583 96.5,51.5C 99.1765,58.1829 101.843,64.8496 104.5,71.5 Z"/></g>
                    <g><path style="opacity:0.85" fill="currentColor" d="M 59.5,69.5 C 76.9395,78.7215 94.2728,88.2215 111.5,98C 113.255,98.7199 114.089,99.8866 114,101.5C 96.7068,111.896 79.2068,121.896 61.5,131.5C 43.8705,121.683 26.2038,111.85 8.5,102C 8.04265,101.586 7.70931,101.086 7.5,100.5C 24.8967,90.1406 42.23,79.8073 59.5,69.5 Z M 62.5,88.5 C 67.1271,88.5734 71.4604,89.7401 75.5,92C 81.0503,96.1475 80.7169,99.8141 74.5,103C 67.4457,104.456 60.4457,104.956 53.5,104.5C 56.5,106.333 59.5,108.167 62.5,110C 60.7513,111.292 58.918,112.458 57,113.5C 50.0845,109.626 43.2512,105.626 36.5,101.5C 37.0253,100.808 37.6919,100.308 38.5,100C 48.5,99.6667 58.5,99.3333 68.5,99C 71.1667,97.3333 71.1667,95.6667 68.5,94C 63.9005,94.0111 59.5672,93.0111 55.5,91C 57.9269,90.0977 60.2603,89.2644 62.5,88.5 Z"/></g>
                </svg>
                    <span class="font-bold"><a>La Quini 2025</a></span>
                </a>

            </nav>
            <section class="flex flex-col mb-5 px-2">
                <LoggedIn v-if="$page.props.auth.user"/>
                <LoggedOut v-else/>
            </section>
        </header>
    </section>
</template>

<style scoped>
.menu-item {
    @apply flex items-center cursor-pointer p-3 rounded transition duration-150 ;
}

</style>
<script setup>
import Image    from 'primevue/image';
import Header   from "@/Components/League/Header.vue";
import LoggedIn from "@/Components/Layout/Navbar/LoggedIn.vue";
import LoggedOut from "@/Components/Layout/Navbar/LoggedOut.vue";
</script>

import {defineConfig} from 'vite';
import laravel        from 'laravel-vite-plugin';
import vue            from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            script: {
                defineModel: true
            },
        })
    ],
    publicDir: 'public',
    resolve: {
        alias: {
            'ziggy-js': '/vendor/tightenco/ziggy/dist/vue.m',
            '~': '/resources/js',
        },
    },
});

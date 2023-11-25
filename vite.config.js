import { resolve } from 'node:path';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            script: {
                defineModel: true
            }
        })
    ],
    resolve: {
        alias: {
            'ziggy-js': resolve(__dirname,'/vendor/tightenco/ziggy/dist/vue.m'),
            '~': resolve(__dirname, '/resources/js'),
        },
    },
});

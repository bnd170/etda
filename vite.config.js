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
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        })
    ],
    server: {
        hmr: {
            host: 'kodiak-content-awfully.ngrok-free.app',
            protocol: 'wss',
        },
    },
    publicDir: 'public',
    resolve: {
        alias: {
            'ziggy-js': ['/vendor/tightenco/ziggy'],
            '~': '/resources/js',
            'css': '/resources/css',
        },
    },
});

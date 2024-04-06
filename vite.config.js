import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/jquery.js',
                'resources/js/bootstrap.esm.js',
                'resources/js/jasny-bootstrap.min.js',
                'resources/css/bootstrap.min.css',
                'resources/css/jasny-bootstrap.min.css',
                'resources/css/navmenu.css',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});

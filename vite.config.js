import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/responsive.css',
                'resources/css/components.css',
                // если есть JS, то добавьте 'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
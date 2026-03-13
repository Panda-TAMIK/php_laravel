import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
<<<<<<< HEAD
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
=======
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
<<<<<<< HEAD
});
>>>>>>> 2245a15 (first commit)
=======
});
>>>>>>> 019e4b8 (finish laravel)

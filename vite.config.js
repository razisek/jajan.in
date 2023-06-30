import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/creator_profil.css', 'resources/css/creator_pop_up.css'],
            refresh: true,
        }),
    ],
});

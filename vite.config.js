import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/stitch/register.css',
                'resources/js/stitch/register.js',
                'resources/css/stitch/quiz.css',
                'resources/js/stitch/quiz.js',
                'resources/css/stitch/profile.css',
                'resources/js/stitch/profile.js',
                'resources/css/stitch/categories.css',
                'resources/js/stitch/categories.js',
                'resources/css/stitch/about.css',
                'resources/js/stitch/about.js',
                'resources/css/stitch/login.css',
                'resources/js/stitch/login.js',
                'resources/css/stitch/home.css',
                'resources/js/stitch/home.js',
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/index.css',
                'resources/css/bootstrap.min.css',
                'resources/css/flaticon.css',
                'resources/css/font-awesome.min.css',
                'resources/css/jquery-ui.min.css',
                'resources/css/linearicons.css',
                'resources/css/magnific-popup.css',
                'resources/css/nice-select.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/slicknav.min.css',
            ],
            // refresh: [
            //     ...refreshPaths,
            //     'app/Http/Livewire/**',
            //     'app/Tables/Columns/**',
                
            // ],
            refresh: true,
        }),
    ],
});

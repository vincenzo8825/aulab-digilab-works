import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        // Abilita la minificazione
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
                pure_funcs: ['console.log'],
            },
            mangle: {
                safari10: true,
            },
        },
        // Divide il codice in chunks più piccoli
        rollupOptions: {
            output: {
                manualChunks: (id) => {
                    if (id.includes('node_modules')) {
                        if (id.includes('bootstrap')) {
                            return 'vendor-bootstrap';
                        }
                        if (id.includes('axios')) {
                            return 'vendor-axios';
                        }
                        return 'vendor';
                    }
                    
                    if (id.includes('resources/js/')) {
                        if (id.includes('navbar.js')) {
                            return 'navbar';
                        }
                        if (id.includes('hero-slider.js')) {
                            return 'hero-slider';
                        }
                        return 'app';
                    }
                },
                chunkFileNames: 'assets/js/[name]-[hash].js',
                entryFileNames: 'assets/js/[name]-[hash].js',
                assetFileNames: 'assets/[ext]/[name]-[hash].[ext]',
            },
        },
        cssCodeSplit: true,
        sourcemap: false,
    },
});

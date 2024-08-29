import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import vueform from '@vueform/vueform/tailwind';
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './vueform.config.ts',
        './node_modules/@vueform/vueform/themes/tailwind/**/*.vue',
        './node_modules/@vueform/vueform/themes/tailwind/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, vueform],
    
    vfDarkMode: false,
};

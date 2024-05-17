import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors:{
            'negro': '#000000',
            'azulm': '#00BBDF',
            'azulo': '#002D9E',
            'azulc': '#00E0F4',
            'azulp': '#091445',
            'blanco': '#FFFFFF',
            'fondo': '#E1EBEC',
            'fondob': '#C0D6D7',
            'error': '#CE0505',
            'exito': '#05CE05'

        }
    },

    plugins: [forms, typography],
};

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'emerald': '#384c4c',
                'emerald-middler': '#324444',
                'emerald-middle': '#476668',
                'emerald-light': '#49696B',
                'emerald-lighter': '#405c5c',
                'emerald-dark': '#1A2626',
                'monarch': '#9F1F1F',
            },
        },
    },

    plugins: [forms],
};

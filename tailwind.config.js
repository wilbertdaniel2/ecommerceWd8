const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            

            colors: {
                'neutral': '#171717',
                'red': '#dc2626',
                'red400': '#f87171',
                'gray': '#f3f4f6',
                'gray300': '#d1d5db',
                'truegray': '#1f2937',
                'tahiti': {
                    100: '#cffafe',
                    200: '#a5f3fc',
                    300: '#67e8f9',
                    400: '#22d3ee',
                    500: '#06b6d4',
                    600: '#0891b2',
                    700: '#0e7490',
                    800: '#155e75',
                    900: '#164e63',
                  },
                'zinc':{
                   100: '#f3f4f6',
                   200: '#e5e7eb',
                   300: '#d1d5db',
                   400: '#9ca3af',
                   500: '#6b7280',
                   600: '#4b5563',
                   700: '#374151',
                   800: '#1f2937',
                   900: '#111827'
                },
                'rojo':{
                   100: '#fee2e2',
                   200: '#fecaca',
                   300: '#fca5a5',
                   400: '#f87171',
                   500: '#ef4444',
                   600: '#dc2626',
                   700: '#b91c1c',
                   800: '#991b1b',
                   900: '#7f1d1d'
                },
                'yellow':{
                    100: '#fef9c3',
                    200: '#fef08a',
                    300: '#fde047',
                    400: '#facc15',
                    500: '#eab308',
                    600: '#ca8a04',
                    700: '#a16207',
                    800: '#854d0e',
                    900: '#713f12'
                 },
                 'indigo':{
                    100: '#e0e7ff',
                    200: '#c7d2fe',
                    300: '#a5b4fc',
                    400: '#818cf8',
                    500: '#6366f1',
                    600: '#4f46e5',
                    700: '#4338ca',
                    800: '#3730a3',
                    900: '#312e81'
                 }
              }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};

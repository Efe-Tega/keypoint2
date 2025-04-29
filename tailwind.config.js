import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                // purple: '#800080',
                textSecondary: '#6E84A3',
                primaryThinLight: '#68d7ff',
                primaryLight: '#09bbfe',
                primaryDark: '#5a42ec',
                backgroundLight: '#f1f5f9',
                backgroundDark: '#0F171C',
                primaryGradient: 'linear-gradient(90deg, rgba(9,187,254,1) 0%, rgba(90,66,236,1) 100%)',
            },
            scrollBehavior: ['smooth'],
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};

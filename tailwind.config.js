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
            backgroundImage: {
                'limeFizz': 'linear-gradient(to right, #a8ff78, #78ffd6)',
                'lilacDepth': 'linear-gradient(to right, #f3e5f5, #6a1b9a)',
                'creamPlum': 'linear-gradient(to right, #fdfbfb, #957dad)',
                'softSky': 'linear-gradient(to right, #e0f7fa, #00838f)',
                'peachBrick': 'linear-gradient(to right, #ffe0e0, #cc5200)',
                'lightmintEmerald': 'linear-gradient(to right, #e6fff5, #2e8b57)',
                'lilacDeepViolet': 'linear-gradient(to right, #f3e5f5, #6a1b9a)',
                'sunlightGold': 'linear-gradient(to right, #fff9c4, #f57f17 )',
                'fogCharcoal': 'linear-gradient(to right, #f5f5f5, #455a64)',
                'coralRaspberry': 'linear-gradient(to right, #ffd1dc, #c2185b)',
                'frostIceblue': 'linear-gradient(to right, #f0faff, #3f729b)'
            },
            colors: {
                iceBlue: '#3f729b',
                deepViolet: '#6a1b9a',
                brick: '#cc5200',
                sky: '#00838f',
                plum: '#957dad',
                purpleBg: '#800080',
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

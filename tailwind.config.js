/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './storage/framework/views/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                body: '#0a0f1e',
                nav: 'rgba(10,15,30,0.95)',
                card: 'rgba(255,255,255,0.03)',
                primary: {
                    300: '#6ee7b7',
                    400: '#34d399',
                    500: '#10b981',
                },
                accent: {
                    400: '#38bdf8',
                    500: '#0ea5e9',
                },
                border: 'rgba(255,255,255,0.07)',
            },
            boxShadow: {
                glow: '0 0 30px rgba(99, 102, 241, 0.45)',
                'glow-strong': '0 0 50px rgba(129, 140, 248, 0.7)',
            },
        },
    },
    plugins: [],
};


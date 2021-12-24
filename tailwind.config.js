const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: '#51127B',
                'brand-light': '#8365B4',
                'brand-dark': '#400161',
                'second': '#038944',
                'second-light': '#38C490',
                'second-dark': '#026E35',
                'third': '#CF6401',
                'third-light': '#FFA566',
                'third-dark': '#A64A00',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

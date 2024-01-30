const defaultTheme = require('tailwindcss/defaultTheme');

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
                sans: ['"Nunito Sans'],
                poppins:['"Poppins'],
                nunitoSans:['"Nunito Sans'],
            },
            backgroundColor:{
                primary:'#86B6F6',
                secondary: '#B4D4FF',
                third: '#176B87',
                fourth: '#EEF5FF'
            },
            textColor:{
                primary:'#86B6F6',
                secondary: '#B4D4FF',
                third: '#176B87',
                fourth: '#EEF5FF'
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};

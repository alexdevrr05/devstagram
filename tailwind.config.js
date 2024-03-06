/** @type {import('tailwindcss').Config} */
export default {
    // Todo lo que esté dentro de resources
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};

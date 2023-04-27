/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/views/vendor/pagination/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms", "tailwindcss-plugins/pagination")({
            strategy: "class",
        }),
    ],
};

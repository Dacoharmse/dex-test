/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    purge: ['./resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.vue'],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                darker: '#171924',
                dark: '#121318',
                lightgreen: '#16C784',
                vibrantgreen: '#1AFA7B',
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("@tailwindcss/typography")],
};

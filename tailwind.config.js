const defaultTheme = require('tailwindcss/defaultTheme')
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Overpass', ...defaultTheme.fontFamily.sans],
                'serif': ['Martel Sans', ...defaultTheme.fontFamily.serif],
                'body': ['Overpass', ...defaultTheme.fontFamily.sans],
            }
        },
    },

    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#102D4D",
                    "secondary": "#833500",
                    "accent": "#24613b",
                    "neutral": "#ABB6C1", //2B313F
                    "base-100": "#F1F4F8",
                    "info": "#0097b9",
                    "success": "#00af41",
                    "warning": "#F18F01",
                    "error": "#e5004d",
                },
            },
        ],
    },
    plugins: [require("@tailwindcss/typography"), require("daisyui")]
}


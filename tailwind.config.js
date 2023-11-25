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
                'sans': ['Work Sans', ...defaultTheme.fontFamily.sans],
            }
        },
    },

    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#8FBF9F",
                    "secondary": "#833500",
                    "accent": "#24613b",
                    "neutral": "#ebe2cd",
                    "base-100": "#F5ECD7",
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


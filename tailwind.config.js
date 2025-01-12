import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import { plugin } from "alpinejs";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Noto sans", ...defaultTheme.fontFamily.sans],
                quicksand: ["Quicksand", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "hero-pattern": "url('../images/2.jpeg')",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};

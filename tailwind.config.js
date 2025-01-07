import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["InterVariable", ...defaultTheme.fontFamily.sans],
                body: [
                    "Inter",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                    950: "#172554",
                },
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("flowbite-typography")],
    safelist: [
        "bg-purple-100", // Game
        "bg-green-100", // Sport
        "bg-red-100", // Adventure
        "bg-blue-100", // Web Design
        "bg-yellow-100", // UI UX
        "bg-pink-100", // Web Programming
        "bg-orange-100", // Photography
        "bg-cyan-100", // Music
        "bg-lime-100", // Movies
        "bg-teal-100", // Travel
        "bg-brown-100", // Food
        "bg-gold-100", // Fashion
        "bg-indigo-100", // Education
        "bg-silver-100", // Technology
        "bg-violet-100", // Fitness
        "bg-magenta-100", // Health
        "bg-charcoal-100", // Finance
        "bg-beige-100", // Business
        "bg-forestgreen-100", // Nature
        "bg-navy-100", // DIY
        "bg-coral-100", // Art
        "bg-skyblue-100", // Science
        "bg-maroon-100", // History
        "bg-peach-100", // Lifestyle
        "bg-crimson-100", // Gaming
        "bg-plum-100", // Books
        "bg-darkgreen-100", // Cars
        "bg-orchid-100", // Pets
        "bg-steelblue-100", // Parenting
        "bg-salmon-100", // Culture
    ],
};

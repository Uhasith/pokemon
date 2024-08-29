import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import wireuiConfig from "./vendor/wireui/wireui/tailwind.config.js";
import powerGridConfig from "./vendor/power-components/livewire-powergrid/tailwind.config.js";
import filamentConfig from "./vendor/filament/support/tailwind.config.preset";

const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    presets: [wireuiConfig, powerGridConfig, filamentConfig],
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
        "./app/Livewire/**/*Table.php",
        "./vendor/power-components/livewire-powergrid/resources/views/**/*.php",
        "./vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                manrope: ["Manrope", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "pg-primary": colors.blue,
                "blackish": "#212121",
                "yellowish": "#FFC107",
                "grayish": "#27292B",
                "evengray": "#2D2D2D",
                "oddgray": "#282828",
                "darkblackbg": "#1C1C1C",
                "addbg": "#212121"
            },
            maxWidth: {
                '7xl': '1440px',
              }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};

/** @type {import('tailwindcss').Config} */
module.exports = {
  presets: [require("./vendor/wireui/wireui/tailwind.config.js")],

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./overrides/*.php",
    "./vendor/wireui/wireui/resources/**/*.blade.php",
    "./vendor/wireui/wireui/ts/**/*.ts",
    "./vendor/wireui/wireui/src/View/**/*.php",
    "./vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php",
    './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/line-clamp"),
],}

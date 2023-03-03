/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        dark: "#0A0A0A",
        grey: "#2c3039",
        silver: "#EAEAEA",
        light: "#454856",
        lighter: "#626571",
      },
    },
  },
  plugins: [],
}
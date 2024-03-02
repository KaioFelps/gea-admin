/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    colors: {
      "white": "#fff",
      "black": "#000",

      "blue-600": "#1B77AB",
      "blue-500": "#238BC6",

      "purple-600": "#8100A9",
      
      "yellow-500": "#FFAA00",
      
      "gray-1000": "#111112",
      "gray-900": "#1A1A1B",
      "gray-800": "#212121",
      "gray-700": "#2D2D2E",
      "gray-650": "#9394A4",
      "gray-400": "#9394A4",
      "gray-350": "#9F9F9F",
      "gray-300": "#C8C8C8",

      "theme-primary": "#238BC6",
    }
  },
  plugins: [],
}


/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.html"
  ],
  theme: {
    extend: {
      colors: {
        pasundan: '#f97316', // warna oranye khas
      },
    },
  },
  plugins: [],
}

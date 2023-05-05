/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#22288F',
        'secondary': '#E9EEFF',
        'third': '#9EAEEF',
        'dark': '#353535',
        'grey': '#797979'
      },
      fontFamily: {
        'quicksand': ['Quicksand', 'sans-serif']
      }
    },
  },
  plugins: [],
}


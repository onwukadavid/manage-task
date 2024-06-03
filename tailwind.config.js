/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors:{
        "dave":"rgb(50,138,241)"
      }
    },
  },
  plugins: [],
}


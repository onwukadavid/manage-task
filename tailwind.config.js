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
  plugins: [
    require('@tailwindcss/forms')
  ],
}

// import { defineConfig } from "vite";
// import laravel from "laravel-vite-plugin";

// export default defineConfig({
//   plugins: [
//     laravel({
//       input: ['resources/css/app.css', 'resources/js/app.js'],
//       refresh: true,
//     }),
//   ],
// });
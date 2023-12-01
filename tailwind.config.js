/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#7149C6',
        primaryDark: '#56359c',
        primaryLight: '#D4C8E9',
        secondary: '#FF822D',
      },
    },
  },
  plugins: [
    require('@tailwindcss/line-clamp'),
  ],
}


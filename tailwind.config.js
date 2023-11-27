/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    'w-64',
    'w-1/2',
    'rounded-l-lg',
    'rounded-r-lg',
    'bg-gray-200',
    'grid-cols-4',
    'grid-cols-7',
    'h-6',
    'leading-6',
    'h-9',
    'leading-9',
    'shadow-lg',
    'bg-opacity-50',
    'dark:bg-opacity-80'
  ],
  theme: {
    extend: {
      colors: {
        primary: '#7149C6',
        primaryLight: '#D4C8E9',
        secondary: '#FF822D',
        blue: '#2F80ED',
        red: '#DC3545'
      },
    },
  },
  plugins: [
    require('@tailwindcss/line-clamp'),
  ],
}


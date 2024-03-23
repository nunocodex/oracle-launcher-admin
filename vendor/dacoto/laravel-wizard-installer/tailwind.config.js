/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/**/*.blade.php"],
  theme: {
    extend: {},
  },
  safelist: [
    "bg-blue-500",
    "hover:bg-blue-700",
    "bg-red-500",
    "hover:bg-red-700"
  ],
  plugins: [],
}


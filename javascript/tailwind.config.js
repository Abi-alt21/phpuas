/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./uas/**/*.{html,js}", // Scan semua file HTML dan JS di folder "src"
    "./*.html",             // Scan file HTML di root folder
  ],
  theme: {
    extend: {
      colors: {
        primary: "#1DA1F2",  // Contoh warna kustom
        secondary: "#14171A",
      },
    },
  },
  plugins: [
    require("daisyui"), // Tambahkan plugin DaisyUI (opsional)
  ],
  daisyui: {
    themes: ["light", "dark"], // Tema DaisyUI
  },
};

module.exports = {
  purge: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      sm: { min: "640px", max: "767px" },
      md: { min: "768px", max: "1023px" },
      lg: { min: "1024px", max: "1279px" },
      xl: { min: "1280px" },
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
};

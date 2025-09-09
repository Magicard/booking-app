module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Roboto', 'Arial', 'sans-serif'],
        },
    },
  },
  plugins: [],
    variants: {
    extend: {},
        backgroundOpacity: ['active'],
    }
}

module.exports = {
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
        fontFamily: {
            'sans': ['Poppins', 'system-ui']
        }
    },
    variants: {
        extend: {},
    },
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
};
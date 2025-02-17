const mix = require("laravel-mix");

mix.setPublicPath('htdocs')
    .js('resources/js/app.js', 'dist/js')
    .vue()
    .js('resources/js/script.js', 'dist/js')
    .postCss('resources/css/app.css', 'dist/css')
    .postCss('resources/css/admin.css', 'dist/css', [
        require("tailwindcss"),
    ]);
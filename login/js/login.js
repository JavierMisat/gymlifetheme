jQuery(function ($) {
    $('#login h1, #login form').wrapAll('<div class="grupo"></div>');
    $('body').vegas({
        slides: [
            {
                src: `${login_imagenes.ruta_plantilla}/login/img/1.jpg`,
            },
            {
                src: `${login_imagenes.ruta_plantilla}/login/img/3.jpg`
            },
            {
                src: `${login_imagenes.ruta_plantilla}/login/img/2.jpg`,
            }
        ],
        overlay: `${login_imagenes.ruta_plantilla}/login/img/overlays/06.png}`,
        transition: ['fade', 'fade2', 'blur', 'blur2']
    });
});
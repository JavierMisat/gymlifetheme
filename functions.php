<?php
//Cuando se activa el tema ejecutamos e inicializamos soportes
function gymlife_setup()
{
    //habilitar imagenes destacadas para páginas y posts
    add_theme_support('post-thumbnails');

    //Agregar tamaños de imagen personalizado
    add_image_size('cuadrado', 350, 350, true);
    add_image_size('retrato', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);

}

add_action('after_setup_theme', 'gymlife_setup');

//Menus de navegación, agregar más añadiendo items al arreglo
if ( ! function_exists('gymlife_menu')) {
    function gymlife_menu()
    {
        register_nav_menus(array(
            'menu-principal' => __('Menu principal', 'gymlife')
        ));
    }
}
add_action('init', 'gymlife_menu');

//Scripts y styles
if ( ! function_exists('gymlife_scripts_styles')) {
    function gymlife_scripts_styles()
    {

        //Agregando fuentes de Google
        wp_enqueue_style('googleFonts',
            'https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,900|Staatliches&display=swap',
            array(), '1.0.0');

        //Cargamos estilos de menu movil
        wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

        //Agregando normalize a mi plantilla
        wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

        //Hoja de estilos principal
        wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFonts'), '1.0.0');

        //Agregamos archivos js necesarios para menu movil
        wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'),
            '1.0.0', true);

        //Agregamos archivos js personalizados
        wp_enqueue_script('scriptsJS', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'),
            '1.0.0', true);

    }
}
add_action('wp_enqueue_scripts', 'gymlife_scripts_styles');



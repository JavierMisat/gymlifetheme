<?php

	/**
	 * Consultas reutilizables Javier Misat
	 */
	require_once get_template_directory() . '/inc/queries.php';

// Estilos para el menú de login
	function admin_styles () {
		wp_enqueue_style( 'vegasCSS', get_template_directory_uri() . '/login/css/vegas.min.css',
			array(), '1.0.0' );
		wp_enqueue_style( 'loginCSS', get_template_directory_uri() . '/login/css/login.css',
			array(),
			'1.0.0' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'vegasJS', get_template_directory_uri() . '/login/js/vegas.min.js',
			array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'loginJS', get_template_directory_uri() . '/login/js/login.js',
			array( 'jquery' ), '1.0.0', true );
		wp_localize_script( 'loginJS', 'login_imagenes',
			[
				'ruta_plantilla' => get_template_directory_uri(),
			]
		);
	}

	add_action( 'login_enqueue_scripts', 'admin_styles', 10 );

//Cuando se activa el tema ejecutamos e inicializamos soportes
	function gymlife_setup () {
		//habilitar imagenes destacadas para páginas y posts
		add_theme_support( 'post-thumbnails' );

		//Agregar tamaños de imagen personalizado
		add_image_size( 'cuadrado', 350, 350, true );
		add_image_size( 'retrato', 350, 724, true );
		add_image_size( 'cajas', 400, 375, true );
		add_image_size( 'mediano', 700, 400, true );
		add_image_size( 'blog', 966, 644, true );

	}

	add_action( 'after_setup_theme', 'gymlife_setup' );

//Menus de navegación, agregar más añadiendo items al arreglo
	if ( ! function_exists( 'gymlife_menu' ) ) {
		function gymlife_menu () {
			register_nav_menus( array(
				'menu-principal' => __( 'Menu principal', 'gymlife' ),
			) );
		}
	}
	add_action( 'init', 'gymlife_menu' );

//Scripts y styles
	if ( ! function_exists( 'gymlife_scripts_styles' ) ) {
		function gymlife_scripts_styles () {

			//Agregando fuentes de Google
			wp_enqueue_style( 'googleFonts',
				'https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,900|Staatliches&display=swap',
				array(), '1.0.0' );

			//Cargamos estilos de menu movil
			wp_enqueue_style( 'slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css',
				array(), '1.0.0' );

			if ( is_page( 'galeria' ) ):
				//Cargamos estilos de lightbox
				wp_enqueue_style( 'lightboxCSS',
					get_template_directory_uri() . '/css/lightbox.min.css',
					array(), '2.11.1' );
			endif;

			//Agregando normalize a mi plantilla
			wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css',
				array(), '8.0.1' );

			//Hoja de estilos principal
			wp_enqueue_style( 'style', get_stylesheet_uri(), array( 'normalize', 'googleFonts' ),
				'1.0.0' );

			//Agregamos archivos js necesarios para menu movil
			wp_enqueue_script( 'slicknavJS',
				get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ),
				'1.0.0', true );

			if ( is_page( 'galeria' ) ):
				//Cargamos funcionalidad de lightbox
				wp_enqueue_script( 'lightboxJS',
					get_template_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ),
					'2.11.1', true );
			endif;

			//Agregamos archivos js personalizados
			wp_enqueue_script( 'scriptsJS', get_template_directory_uri() . '/js/scripts.js',
				array( 'jquery', 'slicknavJS' ),
				'1.0.0', true );

		}
	}
	add_action( 'wp_enqueue_scripts', 'gymlife_scripts_styles' );

//Definir zona widgets
	function gymlife_widgets () {
		register_sidebar( [
			'name'          => 'Sidebar Clases',
			'id'            => 'sidebar_clases',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="text-center texto-primario">',
			'after_title'   => '</h3>',
		] );

		register_sidebar( [
			'name'          => 'Sidebar Blog',
			'id'            => 'sidebar_blog',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="text-center texto-primario">',
			'after_title'   => '</h3>',
		] );

	}

	add_action( 'widgets_init', 'gymlife_widgets' );


<?php
/*
Template Name: Contenido centrado (No sidebars)
Template Post Type: post, page, event
*/
get_header(); ?>

<main class="contenedor pagina seccion no-sidebar">
    <div class="contenido-principal">
        <?php get_template_part('template-parts/loop-paginas'); ?>
    </div>
</main>
<?php get_footer(); ?>

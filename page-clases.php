<?php get_header(); ?>

<main class="contenedor pagina seccion no-sidebar">
    <div class="text-center">
        <?php get_template_part('template-parts/loop-paginas'); ?>
        <?php gymlife_lista_clases(); ?>
    </div>
</main>
<?php get_footer(); ?>

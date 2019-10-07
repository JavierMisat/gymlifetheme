<?php while (have_posts()):the_post(); ?>
    <?php
    if (has_post_thumbnail()):
        the_post_thumbnail('blog', array('class' => 'imagen-destacada'));
    endif;
    ?>
    <h1 class="text-center texto-primario"><?php the_title() ?></h1>
    <?php
    $hora_inicio = get_field('hora_inicio');
    $hora_fin = get_field('hora_fin');
    ?>
    <p class="informacion-clase"><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio.' a '.$hora_fin ?> horas</p>
    <?php the_content(); ?>
<?php endwhile; ?>
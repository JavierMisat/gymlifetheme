<?php
/**
 * Listar y mostrar cuadros con clases agregadas
 */
function gymlife_lista_clases()
{
    ?>
    <ul class="lista-clases">
        <?php
        $args   = array(
            'post_type'     => 'gymlife_clases',
            'post_per_page' => -1,
            'orderby'       => 'title',
            'order'         => 'ASC'
        );
        $clases = new WP_Query($args);
        while ($clases->have_posts()): $clases->the_post(); ?>

            <li class="clase card gradient">
                <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail('mediano'); ?>
                </a>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php
                    $hora_inicio = get_field('hora_inicio');
                    $hora_fin    = get_field('hora_fin');
                    ?>
                    <p><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . ' a ' . $hora_fin ?> horas</p>
                </div>
            </li>

        <?php endwhile;
        wp_reset_postdata(); ?>
    </ul>

    <?php
}

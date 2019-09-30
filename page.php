<?php
get_header();
while (have_posts()):the_post(); ?>
    <h1><?php the_title() ?></h1>
    <p>Publicado el: <?php the_date(); ?></p>
    <p><i>Publicado por: <?php the_author(); ?></i></p>
    <p><?php the_content(); ?></p>
<?php endwhile; ?>
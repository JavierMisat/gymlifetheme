<aside class="sidebar">
    <?php
    /**
     * Revisar si el custom post type es clases
     * Se puede solucionar con condicionales
     * O agregando un nuevo template part para el loop de clases
     */
    switch (get_post_type()):
        case 'gymlife_clases':
            dynamic_sidebar('sidebar_clases');
            break;
        default:
            dynamic_sidebar('sidebar_blog');
    endswitch;
    ?>
</aside>
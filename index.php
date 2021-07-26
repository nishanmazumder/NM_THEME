<?php

/**
 * Post Page
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php

        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content/content');
            endwhile;
        else :
            get_template_part('template-parts/content/content', 'none');
        endif; 

        ?>

    </div>
</div>

<?php get_footer(); ?>
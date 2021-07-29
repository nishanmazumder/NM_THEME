<?php

/**
 * Post Page
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 col-sm-6 col-xs-12 mt-5">
                    <?php get_template_part('template-parts/content/content'); ?>
                </div>
            <?php endwhile;
        else :
            get_template_part('template-parts/content/content-none'); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
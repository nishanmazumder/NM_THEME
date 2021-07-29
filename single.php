<?php

/**
 * Single Post Page
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <?php get_template_part('template-parts/content/content-single'); ?>
                </div>
            <?php endwhile;
        else :
            get_template_part('template-parts/content/content-none'); ?>
    </div>
<?php endif; ?>
</div>
</div>

<?php get_footer(); ?>
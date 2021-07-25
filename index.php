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
        <div class="col-md-12">
            <?php
            if (is_home() && !is_front_page()) : ?>
                <header class="mb-5">
                    <h1 class="screen-reader-text page-title">
                        <?php single_post_title(); ?>
                    </h1>
                </header>
            <?php endif; ?>
        </div>
    </div>
</div>

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
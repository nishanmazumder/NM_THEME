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
        <div class="col-md-12">
            <h1>Single</h1>
            <?php


            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_title();
            ?>

                    <a href="<?php the_permalink(); ?>">POST</a>

            <?php
                    the_content();

                endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'nm_theme');
            endif;


            ?>


        </div>
    </div>
</div>

<?php get_footer(); ?>
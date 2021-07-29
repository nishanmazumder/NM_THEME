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
            if (is_single()) : ?>
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
        <?php if (have_posts()) : ?>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <?php get_template_part('template-parts/content/content-single'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
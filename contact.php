<?php

/**
 * Template Name: Contact Form
 *
 * @package NM_THEME
 */

get_header();

get_template_part('template-parts/header/site', 'title'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php
            if (shortcode_exists('contact-form-7')) {
                echo do_shortcode('[contact-form-7 id="1836" title="Contact Form NM"]');
            } else echo "Please create Contact form"
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
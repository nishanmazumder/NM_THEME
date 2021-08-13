<?php

/**
 * Template Name: Contact Form
 *
 * @package NM_THEME
 */

get_header();

get_template_part('template-parts/header/site', 'title'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                echo do_shortcode('[contact-form-7 id="1836" title="Contact Form NM"]');
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
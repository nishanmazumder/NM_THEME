<?php

/**
 * Page
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        
        <!-- Post -->
        <div class="col-md-12">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                get_template_part('template-parts/content/content-none');
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
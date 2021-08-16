<?php

/**
 * Home Page
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-md-12"> -->
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'nm_theme');
            endif;
            ?>
        <!-- </div> -->
    </div>
</div>

<?php get_footer(); ?>
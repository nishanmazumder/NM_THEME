<?php

/**
 * Main template
 * @package NM_THEME
 */

use NM_THEME\Inc\Classes\Menus;

?>

<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Header</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>main</h1>
                <?php 
                
                // if ( have_posts() ) : 
                //     while ( have_posts() ) : the_post(); 
                //     the_title();
                //     the_content();
                //     endwhile; 
                // endif; 





                
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
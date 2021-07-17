<?php

/**
 * Main template
 * @package NM_THEME
 */

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
                
                $test = new \NM_THEME\Inc\Classes\Test;
                $nm = new \NM_THEME\Inc\Classes\NM_THEME;
                
                
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
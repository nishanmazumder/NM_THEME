<?php

/**
 *  Template functions
 * 
 * @package NM_THEME
 */

 //Enable classic editor for wordpress//
//add_filter('use_block_editor_for_post','__return_false');

//Theme Bootstrap
nm_theme_get_instance();
function nm_theme_get_instance()
{
   \NM_THEME\Inc\Classes\NM_THEME::get_instance();
}

//Elementor Widget
add_action('init', function(){
    \NM_THEME\Inc\Classes\NM_THEME_POST_WIDGET::get_instance();
    
});




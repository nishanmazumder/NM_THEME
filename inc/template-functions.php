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
   \NM_THEME\Classes\NM_THEME::get_instance();
}

//Elementor Widget
// add_action('init', function(){
//     \NM_THEME\Inc\Classes\NM_THEME_POST_WIDGET::get_instance();
    
//     \Elementor\Plugin::instance()->widgets_manager
//     ->register_widget_type(new \NM_THEME\Inc\Classes\NM_THEME_POST_WIDGET);
// });
// add_action('init', function(){
//     require_once __DIR__. '/../classes/class-elementor-post-widget.php';
    
//     \Elementor\Plugin::instance()->widgets_manager
//     ->register_widget_type(new \NM_THEME\Inc\Classes\NM_THEME_POST_WIDGET);
//  });



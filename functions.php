<?php

/**
 * Functions
 * @package NM_THEME
 */

if (!defined('NM_DIR_PATH')) {
   define('NM_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('NM_DIR_URI')) {
   define('NM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('NM_STYLE_URI')) {
   define('NM_STYLE_URI', untrailingslashit(get_stylesheet_uri()));
}

//Tester
require_once NM_DIR_PATH. '/inc/helpers/tester.php';

//Autoload
require_once NM_DIR_PATH. '/vendor/autoload.php';

//Theme Bootstrap
nm_theme_get_instance();
function nm_theme_get_instance(){
   \NM_THEME\Inc\Classes\NM_THEME::get_instance();
}


//enable classic editor for wordpress//
add_filter('use_block_editor_for_post','__return_false');


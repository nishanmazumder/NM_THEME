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

//Tester
//require_once NM_DIR_PATH. '/inc/helpers/tester.php';

//Autoload
require_once NM_DIR_PATH. '/vendor/autoload.php';

//$test = new Test;


function nmThemeEnque()
{
   wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/src/lib/css/bootstrap.min.css');
   wp_enqueue_style('stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');

   wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/src/style.css', [], filemtime(get_template_directory('/assets/src/style.css')), 'all');

   // wp_register_style('is_archive', get_template_directory_uri() . '/archive.css', [], filemtime(get_template_directory('/archive.css')), 'all');

   // if (is_archive()) {
   //     wp_enqueue_style('is_archive');
   // }

   wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/src/lib/js/bootstrap.min.js', array('jquery'), 'v5.0.1', true); //footer
   wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/src/main.js', array('jquery'), filemtime(get_template_directory() . '/assets/src/main.js'), true); //footer
}

add_action('wp_enqueue_scripts', 'nmThemeEnque');

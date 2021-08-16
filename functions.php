<?php

/**
 * Functions
 * @package NM_THEME
 */

//Theme URL
if (!defined('NM_DIR_PATH')) {
   define('NM_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('NM_DIR_URI')) {
   define('NM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('NM_STYLE_URI')) {
   define('NM_STYLE_URI', untrailingslashit(get_stylesheet_uri()));
}

//Autoload
require_once NM_DIR_PATH . '/vendor/autoload.php';

//Template Functions
require_once NM_DIR_PATH . '/inc/template-functions.php';

//Template Tags
require_once NM_DIR_PATH . '/inc/template-tags.php';

//Template Hooks
require_once NM_DIR_PATH . '/inc/hooks.php';

//Template Hooks
require_once NM_DIR_PATH . '/inc/shortcode.php';

//Tester
require_once NM_DIR_PATH . '/inc/helpers/info&tester.php';






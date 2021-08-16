<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Assets
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /***
        * Actions
        ***/
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        wp_enqueue_style('bootstrap-css', NM_DIR_URI . '/assets/src/lib/css/bootstrap.min.css');
        wp_enqueue_style('stylesheet', NM_STYLE_URI, [], filemtime(NM_DIR_PATH . '/style.css'), 'all');

        wp_enqueue_style('main-css', NM_DIR_URI . '/assets/src/css/style.css', [], filemtime(NM_DIR_PATH. '/assets/src/css/style.css'), 'all');

        // wp_register_style('is_archive', get_template_directory_uri() . '/archive.css', [], filemtime(get_template_directory('/archive.css')), 'all');

        // if (is_archive()) {
        //     wp_enqueue_style('is_archive');
        // }
    }

    public function register_scripts()
    {
        wp_enqueue_script('bootstrap-js', NM_DIR_URI . '/assets/src/lib/js/bootstrap.min.js', array('jquery'), 'v5.0.1', true); //footer
        wp_enqueue_script('main-js', NM_DIR_URI . '/assets/src/js/main.js', array('jquery'), filemtime(NM_DIR_PATH . '/assets/src/js/main.js'), true); //footer
    }
}

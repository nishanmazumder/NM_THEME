<?php

/**
 * Theme Sidebar
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use NM_THEME\Inc\Traits\Singleton;

class Sidebar_Dynamic
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();

    }

    protected function setup_hooks()
    {
        //Actions
        add_action( 'widgets_init', [$this, 'register_sidbars'] );
    }

    public function register_sidbars(){
        //Post Sidebar
        register_sidebar(
            array(
                'id'            => 'post-sidebar',
                'name'          => __( 'Primary Sidebar', 'nm_theme'),
                'description'   => __( 'Widgets for page sidebar', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        //Services
        register_sidebar(
            array(
                'id'            => 'footer-services',
                'name'          => __( 'Footer Services', 'nm_theme'),
                'description'   => __( 'Widgets for footer services', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        //Social
        register_sidebar(
            array(
                'id'            => 'footer-social',
                'name'          => __( 'Footer Social', 'nm_theme'),
                'description'   => __( 'Widgets for footer social', 'nm_theme'),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
            )
        );

        //Footer Widgets
        register_sidebar(
            array(
                'id'            => 'footer-sidebar',
                'name'          => __( 'Footer Menu', 'nm_theme'),
                'description'   => __( 'Widgets for footer social', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
 
}

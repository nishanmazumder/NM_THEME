<?php

/**
 * Theme Sidebar
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Sidebar
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
        register_sidebar(
            array(
                'id'            => 'post-sidebar',
                'name'          => __( 'Primary Sidebar', 'nm_theme'),
                'description'   => __( 'This sidebar for post and single.', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar(
            array(
                'id'            => 'footer-sidebar',
                'name'          => __( 'Footer Sidebar', 'nm_theme'),
                'description'   => __( 'This sidebar for footer.', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
   
}

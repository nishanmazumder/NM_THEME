<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use Elementor\Widget_Base as Widget_Base;

use NM_THEME\Inc\Traits\Singleton;

class NM_THEME_POST_WIDGET extends Widget_Base
{

    use Singleton;

    // protected function __construct()
    // {
    //     $this->setup_hooks();
    // }

    // protected function setup_hooks()
    // {
    //     //Actions
    //     add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    // }




    /**
     *  Widget name
     */
    public function get_name()
    {
        return "nm_theme_el_post";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "NM THEME POST";
    }
    
    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "fa fa-post";
    }

    /**
     * Widget Categories
     */
    public function get_categories()
    {
        
    }

    protected function _register_controls()
    {
        
    }

    public function render(){
        
    }
}

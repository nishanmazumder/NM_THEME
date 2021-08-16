<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use Elementor\Widget_Base as Widget_Base;

//use NM_THEME\Inc\Traits\Singleton;

class NM_THEME_POST_WIDGET extends Widget_Base
{

    //use Singleton;

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
        return "eicon-post-list";
    }

    /**
     * Widget Categories
     */
    public function get_categories()
    {
        return ['theme-elements'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section('content_section', [
            'label' => __( 'Widget Name', 'nm_theme' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);
        $this->add_control('title', [
            'label' => __( 'Title - Widget option', 'nm_theme' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'input_type' => 'text',
            'placeholder' => 'Add Title',
            'default' => 'Default Title'
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<h3>' . $settings['title'] . '</h3>';
    }
}

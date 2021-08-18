<?php

/**
 * Elementor Widget - Simple text 
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;

class NM_SIMPLETEXT_WIDGET extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "nm_theme_el_simpletext";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "NM Simple text";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "eicon-t-letter";
    }

    /**
     * Widget Categories
     */
    public function get_categories()
    {
        return ['theme-elements'];
    }

    /**
     * Widget Controls
     */
    protected function _register_controls()
    {
        /////// - Widget Tab
        $this->start_controls_section('content_section', [
            'label' => __('Widget Name', 'nm_theme'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);

        /////// - Widget Options
        $this->add_control('nm_title', [
            'label' => __('Title', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'input_type' => 'textarea',
            'placeholder' => __('Add Title', 'nm_theme'),
            'default' => __('This is Title', 'nm_theme'),
        ]);

        $this->add_control(
            'nm_text_align',
            [
                'label' => __('Text Alignment', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'nm_theme'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'nm_theme'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'nm_theme'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->add_control('nm_color', [
            'label' => __('Color', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'input_type' => 'color',
            'default' => '#8AC25A',
        ]);

        $this->end_controls_section();
    }

    /**
     * Widget Display
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        echo '<h3 style="color:' . $settings['nm_color'] . '; text-align:'.$settings['nm_text_align'].' ;">' . $settings['nm_title'] . '</h3>';
    }
}

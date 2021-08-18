<?php

/**
 * Elementor Widget - Contact Form 7
 * Details : All Contact form list
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;
use WP_Query;

class NM_THEME_CF7 extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "nm_theme_cf7";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "NM Contact Form 7";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "fa fa-envelope";
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
        wp_reset_postdata();

        /////// - Widget Tab
        $this->start_controls_section('content_section', [
            'label' => __('Contact Form 7', 'nm_theme'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]);

        /////// - Widget Options
        $this->add_control('nm_cf7', [
            'label' => __('Select Form', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_contact_form()
        ]);

        $this->end_controls_section();
    }

    /**
     * Get Contact form data
     */
    public function get_contact_form()
    {
        $args = [
            'post_type' => 'wpcf7_contact_form',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'nopaging' => true
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $data = get_the_ID() . '_' . get_the_title();
                $options[$data] = get_the_title();
            endwhile;
        endif;

        wp_reset_postdata();

        return $options;
    }

    /**
     * Widget Display
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $form = explode('_', $settings['nm_cf7']);
        echo do_shortcode('[contact-form-7 id="' . $form[0] . '" title="' . $form[1] . '"]');
    }
}

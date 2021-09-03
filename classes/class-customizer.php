<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Customizer
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('customize_register', [$this, 'nm_theme_customizer']);
    }

    public function nm_theme_customizer($customizer)
    {
        $customizer->add_section('nm_copyright', [
            'title' => __('NM Theme', 'nm_theme'),
            //'description' => __('Copyright Text', 'nm_theme'),
            'priority' => 20,
        ]);

        $customizer->add_setting('nm_copyright_settings', [
            'type' => 'theme_mod',
            'default' => '',
            'senitize_callback' => 'nm_copyright_text'
        ]);

        $customizer->add_control('nm_copyright_settings', [
            'label' => __('Copyright Text'),
            //'description' => __('Please add copyright Text', 'nm_theme'),
            'type' => 'text',
            'section' => 'nm_copyright'
        ]);
    }

    
}

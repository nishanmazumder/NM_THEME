<?php

/**
 * Widget
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Widget
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Register Simpletext
        add_action('widgets_init', [$this, 'simpletext_register']);

        //Register Simpletext - Elementor
        add_action('init', [$this, 'el_simpletext_register']);
    }

    public function simpletext_register()
    {
        register_widget('NM_THEME\Classes\SimpleText');
    }

    public function el_simpletext_register()
    {
        require_once __DIR__ . '/widgets/class-el-simpleText.php';

        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_SIMPLETEXT_WIDGET);
    }
}

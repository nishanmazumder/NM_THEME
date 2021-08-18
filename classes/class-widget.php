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
        add_action('init', [$this, 'nm_elementor_widgets_register']);
    }

    public function nm_elementor_widgets_register()
    {
        //Simple Text
        require_once __DIR__ . '/widgets/class-el-simpleText.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_SIMPLETEXT_WIDGET);

        //Post List - Small
        require_once __DIR__ . '/widgets/class-el-post-small.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_POST_LIST_SMALL);

             //Post List - Small
        require_once __DIR__ . '/widgets/class-el-cf7.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_THEME_CF7);
    }

    //Custom text widget
    public function simpletext_register()
    {
        register_widget('NM_THEME\Classes\SimpleText');
    }
}

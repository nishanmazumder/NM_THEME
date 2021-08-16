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
        //Actions
        add_action('init', [$this, 'nm_simpletext_register']); //Elementor
    }

    public function nm_simpletext_register(){
        require_once __DIR__. '/widgets/class-el-simpleTextphp';

        \Elementor\Plugin::instance()->widgets_manager
        ->register_widget_type(new \NM_THEME\Classes\Widget\NM_THEME_POST_WIDGET);
    }

    
}

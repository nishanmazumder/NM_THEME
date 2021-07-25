<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use NM_THEME\Inc\Traits\Singleton;

class Blank
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    }

    
}

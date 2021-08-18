<?php

/**
 * Theme Shortcode
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Shortcode
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Shortcode for simple text
        add_shortcode('nm_title_des', [$this, 'add_title_des_shortcode']);
    }

    public function add_title_des_shortcode($atts)
    {

        $atts = shortcode_atts([
            'title' => "Default Title",
        ], $atts, 'nm_title_des');

        echo sprintf("%s", $atts['title']);
    }
}

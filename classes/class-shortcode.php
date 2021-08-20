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

        //Shortcode for new custom post type - Projects
        add_shortcode('add_project', [$this, 'add_project_shortcode']);
    }

    public function add_title_des_shortcode($atts)
    {

        $atts = shortcode_atts([
            'title' => "Default Title",
        ], $atts, 'nm_title_des');

        echo sprintf("%s", $atts['title']);
    }

    public function add_project_shortcode($atts)
    {
        $atts = shortcode_atts([
            'id' => '1',
            'title' => 'Project Title'
        ], $atts, 'add_project');

        $data = '';
        $data .= get_the_title($atts['id']);
        $data .= get_the_post_thumbnail($atts['id']);
        $data .= get_the_excerpt($atts['id']);

        return $data;
        //return print_r($atts);
    }
}

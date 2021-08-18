<?php

/**
 * Elementor Widget - Post list
 * Details : Image Left & right content (small)
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;
use WP_Query;

class NM_POST_LIST_SMALL extends Widget_Base
{
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
        return "NM Post List";
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

    /**
     * Widget Controls
     */
    protected function _register_controls()
    {
    }

    /**
     * Widget Display
     */
    protected function render()
    {

        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 5
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                the_title();
                the_post_thumbnail();
            endwhile;
        endif;

        wp_reset_postdata();
    }
}

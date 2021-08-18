<?php

/**
 * Theme Hooks
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Hook
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Contact Form 7 conditional field oparetor 
        add_filter('wpcf7cf_get_operators', [$this, 'nm_theme_cf7_operator_active']);

        //Title change for all post
        //add_filter('the_title', 'title_change', 10, 1);
    }

    public function nm_theme_cf7_operator_active($options)
    {
        $options[] = 'greater than or equals';
        $options[] = 'greater than';
        $options[] = 'less than or equals';
        $options[] = 'less than';
        $options[] = 'is empty';
        $options[] = 'not empty';
        $options[] = 'function';

        return $options;
    }

    public function title_change($title){
        return "Change $title with filter";
    }
}

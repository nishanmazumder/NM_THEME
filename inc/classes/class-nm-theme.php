<?php
/**
 * Bootstrap NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use NM_THEME\Inc\Traits\Singleton;

class NM_THEME{

    use Singleton;

    public function __construct()
    {
        wp_die("hwello");

        $this->nm_theme_set_hook();
    }

    public function nm_theme_set_hook(){
        //hooks
    }
}
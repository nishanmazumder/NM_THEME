<?php

/**
 *  Hooks
 * 
 * @package NM_THEME
 */

function title_change($title){
    return "Change $title with filter";
}

//add_filter('the_title', 'title_change', 10, 1);
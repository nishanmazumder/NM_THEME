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

//Contact Form 7 conditional field oparetor 
add_filter('wpcf7cf_get_operators', 'nm_theme_cf7_operator_active');

function nm_theme_cf7_operator_active($options){
    $options[] = 'greater than or equals';
    $options[] = 'greater than';
    $options[] = 'less than or equals';
    $options[] = 'less than';
    $options[] = 'is empty';
    $options[] = 'not empty';
    $options[] = 'function';

    return $options;
}
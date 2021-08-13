<?php

/**
 *  Shortocode
 * 
 * @package NM_THEME
 */

//  Display Simple text and title
// add_action('init', 'nm_title_des_shortcode');
// function nm_title_des_shortcode(){
// }

add_shortcode('nm_title_des', 'add_title_des_shortcode');
function add_title_des_shortcode($atts){

    $atts = shortcode_atts([
        $atts['title'] => "Default Title",
    ], $atts, 'nm_title_des');
    
    echo sprintf("<h2>%s</h2>", $atts['title']);

    
}

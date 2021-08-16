<?php

/**
 *  Template functions
 * 
 * @package NM_THEME
 */

 //Enable classic editor for wordpress//
//add_filter('use_block_editor_for_post','__return_false');

//Theme Bootstrap
nm_theme_get_instance();
function nm_theme_get_instance()
{
   \NM_THEME\Classes\NM_THEME::get_instance();
}



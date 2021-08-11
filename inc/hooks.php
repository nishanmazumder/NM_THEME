<?php

/**
 *  Hooks
 * 
 * @package NM_THEME
 */

 if(!function_exists('nm_theme_custom_class')){
     function nm_theme_custom_class(){
         do_action('nm_theme_add_class');
     }
 }

 add_action('nm_theme_add_class', 'nm_theme_add_new_class');

 if(!function_exists('nm_theme_add_new_class')){
     function nm_theme_add_new_class(){
         return "My Name Nishan";
     }
 }
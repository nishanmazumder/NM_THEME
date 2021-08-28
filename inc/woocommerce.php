<?php

/**
 *  Woocommerce
 * 
 * @package NM_THEME
 */

//Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');


//Main Container
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_after_main_content', 'nm_woo_main_container_end', 11);
add_action('woocommerce_before_main_content', 'nm_woo_main_container_start', 11);

add_action('template_redirect', 'nm_load_shop_layout');

function nm_load_shop_layout()
{
   if (is_shop()) {

      //Sidebar
      add_action('woocommerce_before_main_content', 'nm_woo_sidebar_container_start', 12);
      add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 13);
      add_action('woocommerce_before_main_content', 'nm_woo_sidebar_container_end', 14);

      //Product
      add_action('woocommerce_before_main_content', 'nm_woo_product_container_start', 15);
      add_action('woocommerce_after_main_content', 'nm_woo_product_container_end', 15);
   }
}

function nm_woo_main_container_start()
{
   echo '<div class="container"><div class="row">';
}

function nm_woo_sidebar_container_start()
{
   echo '<div class="col-md-4">';
}

function nm_woo_sidebar_container_end()
{
   echo '</div>';
}

function nm_woo_product_container_start()
{
   echo '<div class="col-md-8">';
}

function nm_woo_product_container_end()
{
   echo '</div>';
}

function nm_woo_main_container_end()
{
   echo '</div></div>';
}


// Shop title
add_filter('woocommerce_show_page_title', 'nm_remove_title');
function nm_remove_title($bool){
   return false;
}

//Page description
add_action('woocommerce_archive_description', 'nm_archive_description');
function nm_archive_description(){
   echo "this is page description";
}

//Add description after title
add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt');

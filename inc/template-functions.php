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

//Get all project from post type - Projects
add_action('wp_ajax_get_all_projects', 'get_filter_project');
add_action('wp_ajax_nopriv_get_all_projects', 'get_filter_project');

function get_filter_project()
{

   check_ajax_referer('23#as14blak&&90ad1584', 'noce');

   $slug = $_POST['value'];

   $args = [
      'post_type' => 'add_project',
      'post_status' => 'publish',
      'posts_per_page' => -1
   ];

   if ($slug != 'all') {
      $args['tax_query'] = [
         [
            'taxonomy' => 'project_type',
            'field'    => 'slug',
            'terms'    => $slug,
         ]
      ];
   }

   $query = new WP_Query($args);

   $data = '';

   if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
         $data .= '<div class="col-md-4">';
         $data .= '<figure>' . get_the_post_thumbnail(get_the_ID(), "nm_post_list", ["class" => "nm-img-full", "loading" => true]) . '</figure>';
         $data .= '<p class="text-primary">' . get_the_term_list(get_the_ID(), 'project_type') . '</p>';
         $data .= '<h3>' . get_the_title() . '</h3>';
         $data .= '<p>' . nm_post_content_limit(15) . '</p>';
         $data .= '</div>';

      endwhile;
   else : echo "No data found";
   endif;
   wp_reset_postdata();

   wp_send_json_success($data, 200);

   wp_die();
}

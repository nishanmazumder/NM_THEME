<?php

/**
 * Post types
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class PostType
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Add Projects
        add_action( 'init', [$this, 'nm_project_custom_post_type'] );

        //Add Projects - Taxonomy
        add_action( 'init', [$this, 'nm_project_taxonomy']);
    }

    public function nm_project_custom_post_type() {

        /**
         * Post Type: Add Projects.
         */
    
        $labels = [
            "name" => __( "Projects", "nm_theme" ),
            "singular_name" => __( "Project", "nm_theme" ),
            "menu_name" => __( "Projects", "nm_theme" ),
            "all_items" => __( "All Projects", "nm_theme" ),
            "add_new" => __( "Add new", "nm_theme" ),
            "add_new_item" => __( "Add new Add Project", "nm_theme" ),
            "edit_item" => __( "Edit Add Project", "nm_theme" ),
            "new_item" => __( "New Add Project", "nm_theme" ),
            "view_item" => __( "View Add Project", "nm_theme" ),
            "view_items" => __( "View Add Projects", "nm_theme" ),
            "search_items" => __( "Search Add Projects", "nm_theme" ),
            "not_found" => __( "No Add Projects found", "nm_theme" ),
            "not_found_in_trash" => __( "No Add Projects found in trash", "nm_theme" ),
            "parent" => __( "Parent Add Project:", "nm_theme" ),
            "featured_image" => __( "Featured image for this Add Project", "nm_theme" ),
            "set_featured_image" => __( "Set featured image for this Add Project", "nm_theme" ),
            "remove_featured_image" => __( "Remove featured image for this Add Project", "nm_theme" ),
            "use_featured_image" => __( "Use as featured image for this Add Project", "nm_theme" ),
            "archives" => __( "Add Project archives", "nm_theme" ),
            "insert_into_item" => __( "Insert into Add Project", "nm_theme" ),
            "uploaded_to_this_item" => __( "Upload to this Add Project", "nm_theme" ),
            "filter_items_list" => __( "Filter Add Projects list", "nm_theme" ),
            "items_list_navigation" => __( "Add Projects list navigation", "nm_theme" ),
            "items_list" => __( "Add Projects list", "nm_theme" ),
            "attributes" => __( "Add Projects attributes", "nm_theme" ),
            "name_admin_bar" => __( "Add Project", "nm_theme" ),
            "item_published" => __( "Add Project published", "nm_theme" ),
            "item_published_privately" => __( "Add Project published privately.", "nm_theme" ),
            "item_reverted_to_draft" => __( "Add Project reverted to draft.", "nm_theme" ),
            "item_scheduled" => __( "Add Project scheduled", "nm_theme" ),
            "item_updated" => __( "Add Project updated.", "nm_theme" ),
            "parent_item_colon" => __( "Parent Add Project:", "nm_theme" ),
        ];
    
        $args = [
            "label" => __( "Add Projects", "nm_theme" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => [ "slug" => "add_project", "with_front" => true ],
            "query_var" => true,
            "menu_icon" => "dashicons-welcome-learn-more",
            "supports" => [ "title", "editor", "thumbnail", "excerpt", "page-attributes" ],
            "taxonomies" => [ "project_type"],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "add_project", $args );
    }

    function nm_project_taxonomy() {

        /**
         * Taxonomy: Project Types.
         */
    
        $labels = [
            "name" => __( "Project Types", "nm_theme" ),
            "singular_name" => __( "Project Type", "nm_theme" ),
            "menu_name" => __( "Project Type", "nm_theme" ),
            "all_items" => __( "All Project Type", "nm_theme" ),
            "edit_item" => __( "Edit project_type", "nm_theme" ),
            "view_item" => __( "View project_type", "nm_theme" ),
            "update_item" => __( "Update project_type name", "nm_theme" ),
            "add_new_item" => __( "Add new project_type", "nm_theme" ),
            "new_item_name" => __( "New project_type name", "nm_theme" ),
            "parent_item" => __( "Parent project_type", "nm_theme" ),
            "parent_item_colon" => __( "Parent project_type:", "nm_theme" ),
            "search_items" => __( "Search Project Type", "nm_theme" ),
            "popular_items" => __( "Popular Project Type", "nm_theme" ),
            "separate_items_with_commas" => __( "Separate Project Type with commas", "nm_theme" ),
            "add_or_remove_items" => __( "Add or remove Project Type", "nm_theme" ),
            "choose_from_most_used" => __( "Choose from the most used Project Type", "nm_theme" ),
            "not_found" => __( "No Project Type found", "nm_theme" ),
            "no_terms" => __( "No Project Type", "nm_theme" ),
            "items_list_navigation" => __( "Project Type list navigation", "nm_theme" ),
            "items_list" => __( "Project Type list", "nm_theme" ),
            "back_to_items" => __( "Back to Project Type", "nm_theme" ),
        ];
    
        
        $args = [
            "label" => __( "Project Types", "nm_theme" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => false,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'project_type', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "project_type",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "project_type", [ "add_project" ], $args );
    } 
    
}

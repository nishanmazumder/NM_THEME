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

        //Add column on custom post type - Projects
        add_filter('manage_add_project_posts_columns', [$this, 'nm_add_taxonomy_column']);
        add_action('manage_posts_custom_column', [$this, 'nm_add_taxonomy_column_functions'], 10, 2);
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

    public function title_change($title)
    {
        return "Change $title with filter";
    }

    public function nm_add_taxonomy_column($columns)
    {

        $columns = [
            'cb' => $columns['cb'],
            'title' => __('Title', 'nm_theme'),
            'taxonomy' => __('Taxonomy', 'nm_theme'),
            'thumbnail' => __('Thumbnail', 'nm_theme'),
            'shortcode' => __('Shortcode', 'nm_theme'),
            'author' => __('Author', 'nm_theme')
        ];

        return $columns;
    }

    public function nm_add_taxonomy_column_functions($columns, $post_id)
    {
        switch ($columns) {
            case 'taxonomy':
                echo strip_tags(get_the_term_list($post_id, 'project_type'));
                break;
            case 'thumbnail':
                echo get_the_post_thumbnail($post_id, [32, 32]);
                break;
            case 'shortcode': //On Shorcode Class
                echo '[add_project id="'.get_the_ID().'" title="'.get_the_title().'"]';
                break;
            default:
                echo "Nothing found";
                break;
        }
    }
}

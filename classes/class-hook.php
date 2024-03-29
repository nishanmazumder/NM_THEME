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

        //Theme Hook & Filter test
        add_action('nm_theme_hook_test', [$this, 'nm_echo_hook']);
        add_action('nm_theme_hook_test', [$this, 'nm_echo_hook_2'], 11);
        
        //add_filter('nm_theme_filter_test', [$this, 'nm_return_filter'], 10, 2);

        //remove_filter('nm_theme_filter_test', [$this, 'nm_return_filter'], 10, 2);
        //add_filter('nm_theme_filter_test', [$this, 'nm_return_filter_overrid'], 11, 2);

        //add_action('save_post', [$this, 'nm_save_post']);

        // add_filter('nm_post_msg', function ($message) {
        //     $message = $message . " saved on " . date('F j');
        //     return $message;
        // });
    }

    public function nm_echo_hook()
    {
        echo "This is hook";
    }

    public function nm_echo_hook_2()
    {
        echo "This is hook 2";
    }

    public function nm_return_filter($text, $text2)
    {
        //$input = "<h3>Test</h3>";
        $text3 = $text. ' ' . $text2;
        return $text3;
    }


    public function nm_return_filter_overrid($val1)
    {
        $val1 = $val1 . "New Filter";
        return $val1;
    }

    public function nm_save_post($post_id)
    {

        // if (!(wp_is_post_autosave($post_id)) || !(wp_is_post_revision($post_id))) {
        //     return;
        // }

        if (wp_is_post_revision($post_id)) {
            return;
        }

        $post_data = NM_DIR_PATH . '/simple.txt';
        $message = apply_filters('nm_post_msg', get_the_title($post_id) . " was saved !");

        if (file_exists($post_data)) {
            $file = fopen($post_data, 'a');
            fwrite($file, $message . "\n");
        } else {
            $file = fopen($post_data, 'w');
            fwrite($file, $message . "\n");
        }

        fclose($file);
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
            'project_taxonomy' => __('Taxonomy', 'nm_theme'),
            'project_thumbnail' => __('Thumbnail', 'nm_theme'),
            'project_shortcode' => __('Shortcode', 'nm_theme'),
            'author' => __('Author', 'nm_theme')
        ];

        return $columns;
    }

    public function nm_add_taxonomy_column_functions($columns, $post_id)
    {
        switch ($columns) {
            case 'project_taxonomy':
                echo strip_tags(get_the_term_list($post_id, 'project_type'));
                break;
            case 'project_thumbnail':
                echo get_the_post_thumbnail($post_id, [32, 32]);
                break;
            case 'project_shortcode': //On Shorcode Class
                echo '[add_project id="' . get_the_ID() . '" title="' . get_the_title() . '"]';
                break;
                // default:
                //     echo "Nothing found";
                //     break;
        }
    }
}

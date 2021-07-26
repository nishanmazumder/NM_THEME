<?php

/**
 * Custom Metabox
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use NM_THEME\Inc\Traits\Singleton;

class META_BOX
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('add_meta_boxes', [$this, 'hide_page_meta_box']);
    }

    public function hide_page_meta_box()
    {
        $screens = ['page'];

        foreach ($screens as $screen) {
            add_meta_box(
                'hide_page_meta_box_id',    // Unique ID
                __('Hide Page Title', 'nm_theme'),       // Box title
                [$this, 'hide_page_meta_box_html'],       // Callback function
                $screen,                 // Post type
                'side',                  // Side or Bottom / Location
                'default'

            );
        }
    }

    public function hide_page_meta_box_html($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_meta_key', true);
?>
        <label for="nm_field"><?php esc_html_e('Hide page title') ?></label>
        <select name="nm_field" id="nm_field" class="postbox">
            <option value=""><?php esc_html_e('Selectr an option') ?></option>
            <option value="yes" <?php selected($value, 'yes'); ?>><?php esc_html_e('Yes') ?></option>
            <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('No') ?></option>
        </select>
<?php
    }
}

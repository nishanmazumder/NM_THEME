<?php

/**
 * Widgets - Clock
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use WP_Widget;


/**
 * Adds Foo_Widget widget.
 */
class Clock_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'nm_name_widget', // Base ID
            'Name Submission', // Name
            array('description' => __('Clock Widget', 'nm_theme'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        // From frontend form submission...
        // if (isset($_POST['nm_btn_submit'])) {
        //     $user_name = $_POST['nm_name_user'];
        //     $this->form($user_name);
        // }

?>
        <div class="row">
            <div class="col-md-12 mt-2 mb-2 bg-info pt-2 pb-3">

                <!-- <form method="POST" class="mb-3 mt-3">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="<?php echo $this->get_field_name("nm_name_user"); ?>" id="<?php echo $this->get_field_id("nm_name_user"); ?>" placeholder="My Name">
                    </div>
                    <div class="d-grid">
                        <button name="<?php echo $this->get_field_name("nm_btn_submit"); ?>" type="submit" class="btn btn-outline-danger">Submit</button>
                    </div>
                </form> -->

                <span><?php echo esc_html__("Name Listed Today:", "nm_theme") ?></span>
                <ul class="list-group list-group-numbered">
                    <li class="list-group-item">
                        <?php
                        echo esc_html__($instance['nm_name'], 'nm_theme');
                        ?></li>
                </ul>
            </div>
        </div>
    <?php
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
            $name = $instance['nm_name'];
        } else {
            $title = __('Winner Name', 'nm_theme');
            $name = __('Set Winner Name', 'nm_theme');
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />

            <label for="<?php echo $this->get_field_name('nm_name'); ?>"><?php _e('Name:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('nm_name'); ?>" name="<?php echo $this->get_field_name('nm_name'); ?>" type="text" value="<?php echo esc_attr($name); ?>">
        </p>
<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['nm_name'] = (!empty($new_instance['nm_name'])) ? strip_tags($new_instance['nm_name']) : '';
        //$instance['nm_name_user'] = (!empty($new_instance['nm_name_user'])) ? strip_tags($new_instance['nm_name_user']) : '';

        return $instance;
    }
} // class Foo_Widget

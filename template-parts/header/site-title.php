<?php

/**
 * Title - Page
 * 
 * @package NM_THEME
 */

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php
                $page_id = get_the_ID();
                $page_title_show = get_post_meta($page_id, '_hide_page_meta_key');
                
                if(is_array($page_title_show) && in_array('yes', $page_title_show)){
                    wp_title('');
                }

                ?>
            </h1>
        </div>
    </div>
</div>
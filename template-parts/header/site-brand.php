<?php

/**
 * Site Brand
 * 
 * @package NM_THEME
 */

?>

<a class="navbar-brand" href="#">
    <?php
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
    ?>
</a>
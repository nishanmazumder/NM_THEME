<?php

/**
 * Header template
 * @package nmTheme
 */

?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMTHEME</title>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>

    <div class="container">
        <div class="row">
            <?php get_template_part('template-parts/header/nav'); ?>
        </div>
    </div>
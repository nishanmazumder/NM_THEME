<?php

/**
 * footer template
 * @package NM_THEME
 */

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
        <p><?php echo get_theme_mod('nm_copyright_settings', __('All right reserver @copyright by BDSOFTcr')) ?></p>  
        <p> <?php nm_copyright_text("'All right reserver @copyright by ", "https://www.bdsoftcreation.com/", "BDSOFTcr"); ?> </p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>
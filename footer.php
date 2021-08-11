<?php

/**
 * footer template
 * @package NM_THEME
 */

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <p> <?php nm_copyright_text("'All right reserver @copyright by ", "https://www.bdsoftcreation.com/", "BDSOFTcr"); ?> </p>
        </div>
        <div class="col-md-12">
            <?php 
            
            if(function_exists('nm_theme_custom_class')){
                echo nm_theme_custom_class();
            }
            
            
            ?>
        </div>
    </div>
</div>


<?php wp_footer(); ?>
</body>

</html>
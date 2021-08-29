<?php

/**
 * Search form
 * 
 * @package NM_THEME
 */

?>

<form  class="d-flex" role="search" <?php echo $twentytwenty_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

<!-- only for post -->
<!-- <input type="hidden" value="post" name="post_type" id="post_type" /> -->

<label for="<?php echo esc_attr( $twentytwenty_unique_id ); ?>">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'twentytwenty' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="<?php echo esc_attr( $twentytwenty_unique_id ); ?>" class="form-control me-2 search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentytwenty' ); ?>" aria-label="Search" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input  class="btn btn-outline-success" type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'nm_theme' ); ?>" />
</form>

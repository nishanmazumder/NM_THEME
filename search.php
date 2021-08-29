<?php

/**
 * Search Page
 * 
 * @package NM_THEME
 */


get_header();
?>

<div class="container-fluid">
	<div class="row">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php _e('Search results for: ', 'nm_theme'); ?>
					<span class="page-description"><?php echo get_search_query(); ?></span>
				</h1>
			</header>

		<?php
			while (have_posts()) : the_post();

				get_template_part('template-parts/content/content');

			endwhile;

			nm_post_pagination();
		else :
			get_template_part('template-parts/content/content-none');

		endif;
		?>
	</div>
</div>

<?php
get_footer();

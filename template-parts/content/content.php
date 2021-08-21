<?php

/**
 * Post content - Displaying post list - index.php
 * 
 * @package NM_THEME
 */
?>

<?php

// the_meta()
//get_post_custom(get_the_ID())
//get_post_meta(get_the_id(), 'bg_color', true)
//get_post_custom_keys();
//get_post_custom_values();

//echo "<pre>";
//print_r(get_post_custom(get_the_ID()));

//the_meta();


$nm_blog_color = !empty(get_post_meta(get_the_id(), 'nm_bg_color', true)) ? get_post_meta(get_the_id(), 'nm_bg_color', true) : 'inherit';


?>

<article style="background: <?php echo $nm_blog_color; ?>;" id="nm-post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

		<!-- Post Image -->
		<div class="col-md-12">
			<?php if (has_post_thumbnail()) {
				the_post_thumbnail('nm_post_list', ['class' => 'nm-img-full', 'title' => 'Blog Image', 'loading' => false]);
			} ?>
		</div>

		<!-- Post Title -->
		<div class="col-md-12 mt-2">
			<?php
			if (function_exists('nm_post_title')) {
				nm_post_title();
			}
			?>
		</div>

		<!-- Post Meta -->
		<div class="col-md-12">
			<?php get_template_part('template-parts/post/post-meta'); ?>
		</div>

		<!-- Post Content -->
		<div class="col-md-12">
			<?php get_template_part('template-parts/post/post-content'); ?>
		</div>

		<!-- Read More -->
		<div class="col-md-12 mt-4">
			<?php nm_theme_read_more(); ?>
		</div>
	</div>
</article>
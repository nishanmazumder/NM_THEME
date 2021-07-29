<?php

/**
 * Post content - Displaying post
 * 
 * @package NM_THEME
 */
?>


<article id="nm-post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<div class="col-md-12">
			<?php if (has_post_thumbnail()) {
				the_post_thumbnail('nm_post_list', ['class' => 'nm-img-full', 'title' => 'Blog Image', 'loading' => false]);
			} ?>
		</div>

		<div class="col-md-12">
			<a class="nm-news-title" href="<?php esc_url(the_permalink()) ?>">
				<?php esc_html("Post Link") ?>
			</a>
		</div>

		<div class="col-md-12">
			<h3><?php wp_kses_post(the_title()); ?></h3>
		</div>

		<div class="col-md-12">
			<?php posted_by(); ?> <span><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php esc_html(the_time('j-F-Y g:i a')); ?></span>
		</div>

		<div class="col-md-12">
			<?php get_template_part('template-parts/post/post', 'content'); ?>
		</div>
	</div>
</article>
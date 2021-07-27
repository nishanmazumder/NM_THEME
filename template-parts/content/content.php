<?php

/**
 * Post content - Displaying post
 * 
 * @package NM_THEME
 */
?>

<div class="col-md-4 col-sm-6 col-xs-12 nm-no-pad">
	<article id="nm-post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="nm-news-area">
			<div class="nm-news">
				<?php 
                
                if(has_post_thumbnail()){
                    the_post_thumbnail('nm_post_list', ['class' => 'nm-img-full', 'title' => 'Blog Image', 'loading'=>false]);
                }
                
                ?>
			</div>
			<div class="nm-news-content">
				<a class="nm-news-title" href="<?php esc_url(the_permalink()) ?>">
				<h3><?php wp_kses_post( the_title() ); ?></h3>
			</a>
				<?php posted_by(); ?> <span><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php esc_html(the_time('j-F-Y g:i a')); ?></span>
				<br>
				<?php get_template_part('template-parts/post/post', 'content'); ?>
				<br>
				
			</div>
		</div>
	</article>
</div>
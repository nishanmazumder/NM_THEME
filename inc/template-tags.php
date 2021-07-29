<?php

/**
 *  Custom template tags for this theme
 * 
 * @package NM_THEME
 */

// Post title
function nm_post_title()
{
    if (!is_single()) {
        wp_kses_post(the_title('<h3>', '</h3>', true));
    } else {
        wp_kses_post(the_title('<h1>', '</h1>', true));
    }
}

// Author Link
function nm_posted_by()
{
    // //Outside loop
    // global $post;

    //Get author id from post global
    // $author_id = $post->post_author;

    // //Get author display_name
    // $author_name = get_the_author_meta('display_name', $author_id);

    //Get author id from Post loop
    $author_id = get_the_author_meta('ID');

    //Get author Posts
    $author_post_url = get_author_posts_url($author_id);

    $post_by = sprintf(
        esc_html_x('by %s', 'post author', 'nm_theme'),
        '<a href="' . esc_url($author_post_url) . '">' . esc_html(get_the_author()) . '</a>'
    );

    echo $post_by;
}

// Post Excerpt
function post_excerpt_limit($content_count = 0)
{
    if (!has_excerpt() ||  0 === $content_count) {
        the_excerpt();
        return;
    }

    // Get Excerpt
    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $content_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . '[...]';
}

// Post Category
function nm_get_category()
{
    //Get Cateory list
    $categories = get_the_category();

    foreach ($categories as $category) {
        //Get Cateory link
        $category_link = get_category_link($category);
        echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
    }
}

// Post Tags
function nm_get_tag()
{
    $tags = get_the_tags();

    foreach ($tags as $tag) {
        $tag_link = get_tag_link($tag);
        echo '<a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a>';
    }
}

// Post Category & Tags
function nm_get_term()
{
    $post_id = get_the_ID();
    $terms = wp_get_post_terms($post_id, ['category', 'post_tag']);

    foreach ($terms as $term) {
        $term_link = get_term_link($term);
        echo '<a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
    }
}

// Read More
function nm_theme_read_more()
{
    if (!is_single()) {
        $readmore = sprintf(
            '<a class="btn btn-danger" href="%1$s">%2$s</a>',
            esc_url(get_the_permalink()),
            __('Read More', 'nm_theme')
        );
    }

    echo $readmore;
}

//Copyright
function nm_copyright_text($text, $link, $linktext)
{
    $copyright = sprintf(
        __($text . '%s', 'nm_theme'),
        wp_kses('<a href="' . $link . '">' . $linktext . '</a>', [
            'a' => [
                'href' => []
            ]
        ])
    );

    echo $copyright;
}

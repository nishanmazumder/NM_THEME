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

    $autor_link = sprintf(
        esc_html_x('by %s', 'post author', 'nm_theme'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
    );

    echo "<span>" . $autor_link . "</span>";
}

// Post Excerpt
function post_excerpt_limit($content_count = 0)
{
    if (!has_excerpt() ||  0 === $content_count) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $content_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . '[...]';
}

// Read More
function nm_theme_read_more()
{
    if (!is_single()) {
        $readmore = sprintf(
            '<a class="btn btn-danger" href="%1$s">%2$s</a>',
            get_the_permalink(),
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

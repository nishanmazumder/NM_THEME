<?php

/**
 * Template Name: Project Template
 *
 * @package NM_THEME
 */

get_header(); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 text-center">
            <?php

            //Get Post type Project taxonomy - Project Type
            $terms = get_terms(array(
                'taxonomy' => 'project_type',
                'hide_empty' => false,
            ));

            if (!empty($terms) && is_array($terms)) {

                $allowed_tags = [
                    'a' => [
                        'href' => [],
                        'class' => [],
                        'data-slug' => []
                    ]
                ];

                echo wp_kses('<a href="#" data-slug="all" class="btn btn-danger filter">All Project</a>', $allowed_tags);
                foreach ($terms as $term) {
                    echo wp_kses('<a href="#" data-slug="' . $term->slug . '" class="btn btn-primary filter">' . $term->name . '</a>', $allowed_tags);
                }
            }

            ?>
        </div>
    </div>
    <div class="row" id="nmProjects">
        <?php

        $args = [
            'post_type' => 'add_project',
            'post_status' => 'publish',
            'posts_per_page' => -1
        ];

        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4">
                    <?php the_post_thumbnail("nm_post_list", ["class" => "nm-img-full", "loading" => true]); ?>
                    <p class="text-primary"><?php the_terms(get_the_ID(), 'project_type')?></p>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo nm_post_content_limit(15); ?></p>
                </div>
        <?php
            endwhile;
        else : echo "No data found";
        endif;

        wp_reset_postdata();

        ?>

    </div>
</div>

<?php get_footer(); ?>
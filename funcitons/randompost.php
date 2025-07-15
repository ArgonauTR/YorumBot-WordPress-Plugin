<?php
// Rastgele Konu Çekiyor
function get_random_post_data()
{
    $query = new WP_Query([
        'post_type'      => 'post',
        'post_status'   => 'publish',
        'posts_per_page' => 1,
        'orderby'        => 'rand'
    ]);

    if (!empty($query->posts)) {
        $post = $query->posts[0];

        return [
            'ID'        => $post->ID,
            'title'     => get_the_title($post),
            'content'   => apply_filters('the_content', $post->post_content),
            'excerpt'   => get_the_excerpt($post),
            'permalink' => get_permalink($post),
            'date'      => get_the_date('', $post),
            'author'    => get_the_author_meta('display_name', $post->post_author),
            'thumbnail' => get_the_post_thumbnail_url($post, 'medium') // veya 'full'
        ];
    }

    return null; // Yazı bulunamazsa
}

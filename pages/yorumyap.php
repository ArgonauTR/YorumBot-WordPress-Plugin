<style>
.custom-alert {
    background-color: #d4edda;
    color: #155724;
    padding: 12px 20px;
    border-left: 5px solid #28a745;
    border-radius: 5px;
    margin: 10px 0;
    font-family: sans-serif;
}
</style>

<?php

// Rastgele Yorum Çekiyor.
function get_random_post_data()
{
    $query = new WP_Query([
        'post_type'      => 'post',
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

$post_data = get_random_post_data();

$author_name = randomname() . rand(1, 99);

// Yorumu Gönderiyor.
if (isset($_POST["yorum_gonder"])) {

    $commentdata = array(
        'comment_post_ID'      => $post_data["ID"],
        'comment_author'       => $author_name,
        'comment_author_email' => permalink($author_name) . randomservice(),
        'comment_author_url'   => "",
        'comment_content'      => $_POST["yorum"],
        'user_id'              => 0, // Misafir yorumcu
        'comment_approved'     => 1, // Varsayılan olarak beklemede
    );

    $comment_id = wp_insert_comment($commentdata);

    if (! is_wp_error($comment_id)) {
        echo '<div class="custom-alert"> İşlem başarıyla tamamlandı!</div>';
    } else {
        echo '<div class="custom-alert"> Bir hata alındı!</div>';
    }
}
?>

<div class="wrap">
    <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.1); max-width: 800px;">

        <h1><?php echo $post_data["title"]; ?></h1>
        <p>
            <?php echo $post_data["excerpt"]; ?>
            <a href="<?php echo $post_data["permalink"]; ?>" target="_blank">devamını oku</a>
        </p>

        <hr>

        <form method="post" action="">

            <label><strong><?php echo $author_name; ?></strong> olarak yorum yapıyorsunuz.</label><br>
            <textarea name="yorum" rows="5" required></textarea><br><br>

            <input type="submit" name="yorum_gonder" value="Yorumu Gönder">
        </form>

    </div>
</div>
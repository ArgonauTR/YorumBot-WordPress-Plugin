<?php
// Post vara yorumu ekliyor.
if (isset($_POST["yorum_gonder"])) {
    $commentdata = array(
        'comment_post_ID'      => $_POST["post_id"],
        'comment_author'       => $_POST["author_name"],
        'comment_author_email' => $_POST["author_mail"],
        'comment_author_url'   => "",
        'comment_content'      => $_POST["yorum"],
        'user_id'              => 0, // Misafir yorumcu
        'comment_approved'     => 1, // Varsayılan olarak beklemede
    );

    $comment_id = wp_insert_comment($commentdata);

    if (! is_wp_error($comment_id)) {
        echo '<div class="custom-alert" style="background-color: #d4edda; color: #155724; padding: 12px 20px; border-left: 5px solid #28a745; border-radius: 5px; margin: 10px 0; font-family: sans-serif;"> İşlem başarıyla tamamlandı!</div>';
    } else {
        echo '<div class="custom-alert" style="background-color: #d4edda; color: #155724; padding: 12px 20px; border-left: 5px solid #28a745; border-radius: 5px; margin: 10px 0; font-family: sans-serif;"> Bir hata alındı!</div>';
    }
}


// Rastgele Konu Çekiliyor
$randomPost = get_random_post_data();

// Rastgele isim çekiliyor.
$randomName = randomname();

// Rastgele servis çekiliyor.
$randomService = randomservice();

// Rastgele Numara oluşturuluyor.
$randomNumber = rand(1, 99);

$author_name = $randomName . $randomNumber;
$author_mail = permalink($randomName . $randomNumber) . $randomService;

?>


<div class="wrap">
    <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 8px rgba(0, 0, 0, 0.1); max-width: 800px;">

        <h1><?php echo $randomPost["title"]; ?></h1>
        <p>
            <?php echo $randomPost["excerpt"]; ?>
            <a href="<?php echo $randomPost["permalink"]; ?>" target="_blank"> devamını oku...</a>
        </p>

        <hr>

        <form method="POST">

            <label><strong><?php echo $author_name; ?></strong> olarak yorum yapıyorsunuz.</label>
            <br>
            <br>

            <input type="text" name="author_name" value="<?php echo $author_name; ?>" hidden>

            <input type="text" name="author_mail" value="<?php echo $author_mail; ?>" hidden>

            <input type="text" name="post_id" value="<?php echo $randomPost["ID"]; ?>" hidden>

            <textarea name="yorum" rows="5" required></textarea>
            <br>
            <br>
            <input type="submit" name="yorum_gonder" value="Yorumu Gönder">
        </form>

    </div>
</div>
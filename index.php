<?php

/*
    Plugin Name: YorumBot
    Plugin URI: https://www.sosyalseyler.com/
    Description: Kendi yazılarınıza, hızlı, organik ve rastgele biçimde yorum girmenizi sağlayan bir eklentidir.
    Version: 3.1
    Author: Osman ÖZER
    Author URI: https://www.r10.net/profil/128431-argonaut.html
    License: GPL2
*/

// Doğrudan erişimi engelle
if (!defined('ABSPATH')) exit;

// Menü Bilgileri
add_action('admin_menu', 'yorumbot_menu');

// Menü fonskiyonu hazırlanıyor
function yorumbot_menu()
{
    // Ana menü Bileşenleri
    add_menu_page(
        'YorumBot 3.0',
        'YorumBot',
        'manage_options',
        'yorum-bot',
        'yorum_bot_ana_menu',
        'dashicons-format-chat',
        99
    );

    // Yorum Yap fonskiyonu
    add_submenu_page(
        'yorum-bot',
        'Yorum Yap',
        'Yorum Yap',
        'manage_options',
        'yorum-yap',
        'yorum_yap'
    );
}


// Ana menü sayfa içeriği
function yorum_bot_ana_menu()
{
    // Eklenti Anasayfası
    include "pages/home.php";
}

// Alt menü 1 sayfa içeriği
function yorum_yap()
{
    // Permalink Fonskiyonu
    include "funcitons/permalink.php";

    // Rastgele isimler
    include "funcitons/randomname.php";

    // Rastgele servisler
    include "funcitons/randomservice.php";

    // Rastgele servisler
    include "funcitons/randompost.php";

    //Eklenti Yorum Kısmı
    include "pages/yorumyap.php";
}

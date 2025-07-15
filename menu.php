<?php
// Doğrudan erişimi engelle
if (!defined('ABSPATH')) exit;

// Yönetici menüsünü oluştur
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

    /*
    // Ayarlar Fonskiyonu
    add_submenu_page(
        'yorum-bot',
        'Ayarlar',
        'Ayarlar',
        'manage_options',
        'Ayarlar',
        'ayarlar'
    );
    */
}

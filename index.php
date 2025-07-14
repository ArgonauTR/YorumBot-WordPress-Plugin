<?php

/*
    Plugin Name: YorumBot
    Plugin URI: https://www.sosyalseyler.com/
    Description: Kendi yazılarınıza, hızlı, organik ve rastgele biçimde yorum girmenizi sağlayan bir eklentidir.
    Version: 3.0
    Author: Osman ÖZER
    Author URI: https://www.r10.net/profil/128431-argonaut.html
    License: GPL2
*/

// Menü Bilgileri
include "menu.php";

// Permalink Fonskiyonu
include "permalink.php";

// Permalink Fonskiyonu
include "option.php";

// Rastgele isimler
include "randomname.php";

// Rastgele servisler
include "randomservice.php";


// Ana menü sayfa içeriği
function yorum_bot_ana_menu() {
    include "pages/home.php";
}

// Alt menü 1 sayfa içeriği
function yorum_yap() {
    include "pages/yorumyap.php";
}

// Alt menü 2 sayfa içeriği
function ayarlar() {
    echo '<div class="wrap"><h1>Alt Menü 2</h1><p>Bu ikinci alt menü sayfasıdır.</p></div>';
}



//include "body.php";

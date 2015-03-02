<?

add_theme_support ("post-thumbnails");

add_filter ("gallery_style", "yourmatt_set_gallery_style", 99);
function yourmatt_set_gallery_style () {
    return "<div class=\"gallery\">";
}

?>
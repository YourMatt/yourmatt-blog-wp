<?

// allow all file types to be uploaded to posts
define ("ALLOW_UNFILTERED_UPLOADS", true);

add_action ("init", "yourmatt_random_add_rewrite");
add_action ("wp_enqueue_scripts", "yourmatt_scripts_styles");
add_action ("template_redirect", "yourmatt_random_template");
add_action ("after_setup_theme", "yourmatt_replace_img_shortcodes");
add_filter ("gallery_style", "yourmatt_set_gallery_style", 99);

// allow post featured images
add_theme_support ("post-thumbnails");

function yourmatt_scripts_styles () {

    wp_enqueue_style ("main", get_template_directory_uri () . "/css/main.css", null, "2015-05-29");
    wp_enqueue_style ("genericons", get_template_directory_uri () . "/genericons/genericons.css", null, "3.2");

    wp_enqueue_script ("main", get_template_directory_uri () . "/js/main.js", array ("jquery"), "2015-05-29");
    wp_enqueue_script ("container-fills", get_template_directory_uri () . "/js/containerfills.js", "2015-05-29");
    wp_enqueue_script ("google-maps", "https://maps.googleapis.com/maps/api/js?key=AIzaSyCNH1awWAqvXP-o9aqHwpRJGo5q-hkiGs8", null, null);
    wp_enqueue_script ("maps", get_template_directory_uri () . "/js/maps.js", array ("google-maps"), "2015-05-29");
    wp_enqueue_script ("typekit", "http://use.typekit.net/tvk1ltu.js");

}

// force galleries to not include inline css
function yourmatt_set_gallery_style () {
    return "<div class=\"gallery\">";
}

// add random post support
function yourmatt_random_add_rewrite () {
    global $wp;
    $wp->add_query_var ("random");
}
function yourmatt_random_template() {
    if (get_query_var ("random") != 1) return;

    $posts = get_posts ("post_type=post&orderby=rand&numberposts=1");
    foreach ($posts as $post) {
        $link = get_permalink ($post);
    }
    wp_redirect ($link, 307);
    exit;

}

function yourmatt_gallery_shortcode ($attr)
{

    // create the regular gallery
    $gallery = gallery_shortcode ($attr);

    // add the target attribute to all links.
    $gallery = str_replace ("<a ", "<a target=\"_blank\" ", $gallery);

    return $gallery;

}
function yourmatt_replace_img_shortcodes () {
    remove_shortcode ("gallery", "gallery_shortcode");
    add_shortcode ("gallery", "yourmatt_gallery_shortcode");
}

?>
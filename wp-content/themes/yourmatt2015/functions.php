<?

// allow post featured images
add_theme_support ("post-thumbnails");

// force galleries to not include inline css
add_filter ("gallery_style", "yourmatt_set_gallery_style", 99);
function yourmatt_set_gallery_style () {
    return "<div class=\"gallery\">";
}

// add random post support
add_action ("init", "random_add_rewrite");
function random_add_rewrite () {
    global $wp;
    $wp->add_query_var ("random");
}
add_action ("template_redirect", "random_template");
function random_template() {
    if (get_query_var ("random") == 1) {
        $posts = get_posts ("post_type=post&orderby=rand&numberposts=1");
        foreach ($posts as $post) {
            $link = get_permalink ($post);
        }
        wp_redirect ($link, 307);
        exit;
    }
}

?>
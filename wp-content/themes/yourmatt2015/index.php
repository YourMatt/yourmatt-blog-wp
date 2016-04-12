<?

// find the requested year
if (is_home ()) {
    // temporarily forcing to year 2015 until I add some updates
    $posts_selected_year = 2015; // date ("Y");
}
else {
    $requested_page = array_pop (explode ("/", $_SERVER['REQUEST_URI']));
    if (is_numeric ($requested_page) && strlen ($requested_page) == 4) {
        $posts_selected_year = $requested_page;
    }
}

// load the header
get_header ();

// if the home page, show posts only for the current_year
if (is_home ()) {

    $query_args = "year=" . $posts_selected_year . "&posts_per_page=-1";
    $query = new WP_Query ($query_args);
    if ($query->have_posts ()) {
        while ($query->have_posts ()) {
            $query->the_post ();
            get_template_part ("content", get_post_format ());
        }
    }
}

// if not the home page, use requested view
elseif (have_posts ()) {

    while (have_posts ()) {
        the_post ();
        get_template_part ("content", get_post_format ());
    }

}

// load the footer
get_footer ();

?>
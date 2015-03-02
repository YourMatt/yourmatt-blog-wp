<?

$post_data = get_post ();

// pull title
$post_name = $post_data->post_title;

// pull date elements
$post_date = date ("F jS, Y", strtotime ($post_data->post_date));

// load the post categories
$post_category_ids = wp_get_post_categories ($post_data->ID);
$post_categories = array ();
foreach ($post_category_ids as $post_category_id) {
    $post_category_meta = get_category ($post_category_id);
    $post_categories[] = array (
        "name" => $post_category_meta->name,
        "url" => "/category/" . $post_category_meta->slug
    );
}

?><article class="post">

    <h1><?= $post_name ?></h1>
    <div class="meta">
        Posted on <?= $post_date ?>
        <? if ($post_categories) :
        $category_links = array ();
        foreach ($post_categories as $post_category) :
            $category_links[] = "<a href=\"" . $post_category["url"] . "\">" . $post_category["name"] . "</a>";
        endforeach;
        $category_links = implode (", ", $category_links); ?>
            <span class="separator"></span>
            Filed under <?= $category_links ?>
        <? endif; ?>
    </div>

    <? the_content(); ?>

</article>
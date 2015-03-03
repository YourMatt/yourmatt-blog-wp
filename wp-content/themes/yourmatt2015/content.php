<?
$post_data = get_post ();

// pull title
$post_name = $post_data->post_title;
$post_url = "/" . $post_data->post_name;

// pull date elements
$post_date = strtotime ($post_data->post_date);
$post_date_year = date ("Y", $post_date);
$post_date_month = date ("F", $post_date);
$post_date_day = date ("j", $post_date);

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

// load the primary thumbnail if available
$main_image_url = "";
if (has_post_thumbnail ()) {
    $main_image_url = wp_get_attachment_image_src (get_post_thumbnail_id(), "large")[0];
}

// load the gallery images if available
$gallery_images = array ();
$gallery = get_post_gallery ($post_data->ID, false);
if ($gallery) {
    $gallery_image_ids = explode (",", $gallery["ids"]);

    if (! $main_image_url) {
        $main_image_url = wp_get_attachment_image_src (array_shift ($gallery_image_ids), "large")[0];
    }

    $num_additional_images = count ($gallery_image_ids);

    for ($i = 0; $i < 4; $i++) {
        if (! $gallery_image_ids[$i]) break;

        $gallery_images[] = wp_get_attachment_image_src ($gallery_image_ids[$i], "thumbnail")[0];
        $num_additional_images--;
    }
}

// pull the content
$post_content = $post_data->post_excerpt;
if (! $post_content) { // temporary until adding excerpts for all old posts
    if ($main_image_url) {
        $post_max_chars = 200;
        $post_content = str_replace ("\n", "", $post_data->post_content);
    }
    else {
        $post_max_chars = 500;
        $post_content = $post_data->post_content;
    }
    $post_content = substr (strip_tags ($post_content), 0, $post_max_chars) . "...";
}

?>

<article>
    <ul class="meta">
        <li class="year"><?= $post_date_year ?></li>
        <li class="month"><?= $post_date_month ?></li>
        <li class="day"><?= $post_date_day ?></li>
        <? if ($post_categories) :
                $category_links = array ();
                foreach ($post_categories as $post_category) :
                    $category_links[] = "<a href=\"" . $post_category["url"] . "\">" . $post_category["name"] . "</a>";
                endforeach;
                $category_links = implode (", ", $category_links); ?>
        <li class="categories-title">Filed under</li>
        <li class="categories"><?= $category_links ?></li>
        <? endif; ?>
    </ul>
    <? if ($main_image_url) : ?>
    <div class="primaryimage fill-scaled">
        <img src="<?= $main_image_url ?>"/>
    </div>
    <? endif; ?>
    <? if ($gallery_images) : ?>
    <ul class="additionalimages">
        <? foreach ($gallery_images as $gallery_image_url) : ?>
        <li class="fill-scaled"><img src="<?= $gallery_image_url ?>"/></li>
        <? endforeach; ?>
        <? if ($num_additional_images) : ?>
        <li class="more">+ <?= $num_additional_images ?> more</li>
        <? endif; ?>
    </ul>
    <? endif; ?>
    <h1><?= $post_name ?></h1>
    <p<? if (! $main_image_url) : ?> class="columns"<? endif; ?>><?= str_replace ("\n", "<br/><span class=\"indent\"></span>", $post_content) ?></p>
    <a class="more" href="<?= $post_url ?>">Read More</a>
</article>
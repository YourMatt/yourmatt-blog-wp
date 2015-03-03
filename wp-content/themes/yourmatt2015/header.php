<?

global $posts_selected_year;
$search_text = htmlspecialchars ($_REQUEST["s"]);

$years_archive = array ();
for ($i = 2011; $i >= 2007; $i--) {
    $years_archive[] = $i;
}

$years_current = array ();
for ($i = date ("Y"); $i >= 2015; $i--) {
    $years_current[] = $i;
}

?><!DOCTYPE html>
<html <? language_attributes(); ?>>
<head>

    <meta charset="<? bloginfo( 'charset' ); ?>" />
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>

    <title>IM Your Matt</title>

    <link rel="stylesheet" href="<?= get_template_directory_uri () ?>/css/main.css" type="text/css" media="all"/>
    <link rel='stylesheet' id='genericons-css'  href='<?= get_template_directory_uri () ?>/genericons/genericons.css?ver=3.2' type='text/css' media='all' />

    <script type='text/javascript' src='/wp-includes/js/jquery/jquery.js?ver=1.11.1'></script>
    <script type='text/javascript' src='<?= get_template_directory_uri () ?>/js/main.js'></script>
    <script type='text/javascript' src='<?= get_template_directory_uri () ?>/js/containerfills.js'></script>
    <script src="http://use.typekit.net/tvk1ltu.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

<? wp_head(); /* keep last line of head */ ?>
</head>
<body <? body_class(); ?>>

<header>
    <div class="fixed-width">
        <div class="title">
            <a href="/">Your Matt</a>
        </div>
        <div class="stripe"><div class="detail"></div></div>
        <ul class="navigation">
            <?  // add navigation for single page
                if (is_single ()) : ?>
            <li><a href="/older">Older</a></li>
            <li><a href="/newer">Newer</a></li>
            <li><a href="/random">Random</a></li>
            <li class="separator"></li>
            <?  // add navigation for all list pages
                else :
                    foreach ($years_current as $year_current) : ?>
            <li<? if ($year_current == $posts_selected_year) : ?> class="selected"<? endif; ?>><a href="/<?= $year_current ?>"><?= $year_current ?></a></li>
            <?      endforeach; ?>
            <li class="separator"></li>
            <?      foreach ($years_archive as $year_archive) : ?>
            <li<? if ($year_archive == $posts_selected_year) : ?> class="selected"<? endif; ?>><a href="/<?= $year_archive ?>"><?= $year_archive ?></a></li>
            <?      endforeach;
                endif; ?>
            <li class="search">
                <form id="search-form" action="/">
                    <input type="text" value="<?= $search_text ?>" name="s"/>
                    <a class="search-button genericon genericon-search"></a>
                </form>
            </li>
        </ul>
    </div>
    <div class="stripe"><div class="detail"></div></div>
    <div class="social">
        <a href="https://instagram.com/yourmatt" class="instagram">Instagram</a>
        <a href="https://twitter.com/yourmatt" class="twitter">Twitter</a>
        <a href="http://www.last.fm/user/yourmatt" class="lastfm">Last.FM</a>
    </div>
</header>

<div id="content">
    <div id="primary">
        <main id="main" class="fixed-width">
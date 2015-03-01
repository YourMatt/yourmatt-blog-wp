<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>IM Your Matt</title>
    <link rel="stylesheet" href="<?= get_template_directory_uri () ?>/css/main.css" type="text/css" media="all"/>
    <link rel='stylesheet' id='genericons-css'  href='<?= get_template_directory_uri () ?>/genericons/genericons.css?ver=3.2' type='text/css' media='all' />
    <script type='text/javascript' src='/wp-includes/js/jquery/jquery.js?ver=1.11.1'></script>
    <!--<script type='text/javascript' src='/js/main.js'></script>-->
    <!--<script type='text/javascript' src='/js/imagefills.js'></script>-->
    <script src="http://use.typekit.net/tvk1ltu.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
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
                else : ?>
            <li class="selected"><a href="/2015">2015</a></li>
            <li class="separator"></li>
            <li><a href="/2011">2011</a></li>
            <li><a href="/2010">2010</a></li>
            <li><a href="/2009">2009</a></li>
            <li><a href="/2008">2008</a></li>
            <li><a href="/2007">2007</a></li>
            <? endif; ?>
            <li class="search">
                <form id="search-form">
                    <input type="text" value="" name="search"/>
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
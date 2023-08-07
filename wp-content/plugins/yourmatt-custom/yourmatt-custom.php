<?
/*
Plugin Name: YourMatt Custom
Plugin URI:
Description: Holds all functionality unique to the Your Matt blog site.
Version: 0.9
Author: Dyspro Media
Author URI: http://dyspromedia.com
*/

add_shortcode ('yourmatt_map', 'yourmatt_build_map_tag');

function yourmatt_build_map_tag ($params) {

    $lat = $params['lat'];
    $lng = $params['lng'];
    $zoom = $params['zoom'];
    $type = $params['type'];
    $gpxfile = $params['gpxfile'];
    $scrollwheel = $params['scrollwheel'];
    $showcontrols = $params['showcontrols'];

    $scrollwheel || $scrollwheel = "no";
    $showcontrols || $showcontrols = "yes";

    return '<div class="map" type="' . $type . '" ' .
        'lat="' . $lat . '" ' .
        'lng="' . $lng . '" ' .
        'zoom="' . $zoom . '" ' .
        'gpxfile="' . $gpxfile . '" ' .
        'scrollwheel="' . $scrollwheel . '" ' .
        'showcontrols="' . $showcontrols . '" ' .
        '></div>';

}

?>
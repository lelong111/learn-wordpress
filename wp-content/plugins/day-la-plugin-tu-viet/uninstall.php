<?php 

/**
* @package DayLaPluginTuViet
**/

if (! defined ('WP_UNINSATLL_PLUGIN')) {
    die;
}
$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));
// foreach ($books as $data) {

// }
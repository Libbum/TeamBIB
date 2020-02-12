<?php

add_shortcode("teambib", "teambib_shortcode");
 
function teambib_shortcode() {
    global $post;

    $team = array('post_type' => 'tmm', 'name' => 'ses-link-team');
    $custom_posts = get_posts($team);

    return $custom_posts;

//    $members = get_option('members', 'Bibliography here.');
//    return $members;
}

?>

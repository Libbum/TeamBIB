<?php

add_shortcode("teambib", "teambib_shortcode");

function teambib_shortcode() {
    global $post;

    $team = array('post_type' => 'tmm', 'name' => 'ses-link-team');
    $custom_posts = get_posts($team);

    $names = array();
    foreach($custom_posts as $post) : setup_postdata($post);
        $members = get_post_meta( get_the_id(), '_tmm_head', true );
        if (is_array($members) || is_object($members)) {
            foreach ($members as $key => $member) {
                $first = !empty($member['_tmm_firstname'])) ? $member['_tmm_firstname'] : '';
                $last = !empty($member['_tmm_lastname'])) ? $member['_tmm_lastname'] : '';
                array_push($names, array('first' => $first, 'last' => $last));
            }
        }
    endforeach; wp_reset_postdata();

    return print_r($names);

//    $members = get_option('members', 'Bibliography here.');
//    return $members;
}

?>

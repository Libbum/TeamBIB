<?php

add_shortcode("teambib", "teambib_shortcode");

function teambib_shortcode() {

    $team_name = get_option('member-list');
    $names = teambib_get_members($team_name);

    $bib .= 'From team-members: \n';
    $bib .= print_r($names, true);
    $bib .= '\nFrom Zotero: \n';
    $bib .= print_r(teambib_get_collection(), true);

    return $bib;
}

function teambib_get_members($team_name) {
    global $post;

    $team = array('post_type' => 'tmm', 'name' => $team_name);
    $custom_posts = get_posts($team);

    $names = array();
    foreach($custom_posts as $post) : setup_postdata($post);
        $members = get_post_meta(get_the_id(), '_tmm_head', true);
        if (is_array($members) || is_object($members)) {
            foreach ($members as $key => $member) {
                array_push($names, array('first' => $member['_tmm_firstname'], 'last' => $member['_tmm_lastname']));
            }
        }
    endforeach; wp_reset_postdata();

    return $names;
}

?>

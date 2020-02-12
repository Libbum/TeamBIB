<?php

add_shortcode("teambib", "teambib_shortcode");
 
function teambib_shortcode() {
    global $post;

    $team = array('post_type' => 'tmm', 'name' => 'ses-link-team');
    $custom_posts = get_posts($team);

    $bib = '';

    foreach($custom_posts as $post) : setup_postdata($post);
        $members = get_post_meta( get_the_id(), '_tmm_head', true );
        if (is_array($members) || is_object($members)) {
            foreach ($members as $key => $member) {
                $bib .= '<div class="tmm_names">';
                if (!empty($member['_tmm_firstname']))
                    $bib .= '<span class="tmm_fname">'.$member['_tmm_firstname'].'</span> ';
                if (!empty($member['_tmm_lastname']))
                    $bib .= '<span class="tmm_lname">'.$member['_tmm_lastname'].'</span>';
                $bib .= '</div>';
            }
        } else {
            $bib .= 'No member';
        }
    endforeach; wp_reset_postdata();

    return $bib;

//    $members = get_option('members', 'Bibliography here.');
//    return $members;
}

?>

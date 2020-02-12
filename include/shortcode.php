<?php

add_shortcode("teambib", "teambib_shortcode");
 
function teambib_shortcode() {
    $members = get_option('members', 'Bibliography here.');
    return $members;
}

?>

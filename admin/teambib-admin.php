<?php

add_action('admin_menu', 'teambib_config');

function teambib_config() {
    add_menu_page('TeamBIB Configuration', 'TeamBIB', 'manage_options', 'teambib', 'init');
}

function init() {
    echo "The Admin Page.";
}

?>

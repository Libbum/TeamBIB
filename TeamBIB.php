<?php
/**
 * Plugin Name:       TeamBIB
 * Plugin URI:        https://github.com/Libbum/TeamBIB
 * Description:       Wordpress / Zotero bridge designed for listing a group's shared publication library.
 * Version:           1.0.0
 * Author:            Tim DuBois
 * License:           Apache v2
 * License URI:       https://www.apache.org/licenses/LICENSE-2.0
 * GitHub Plugin URI: Libbum/TeamBIB
 */

if ( is_admin() ) {
    // we are in admin mode
    require_once __DIR__ . '/admin/teambib-admin.php';
} else {
    // build our shortcode
    require_once __DIR__ . '/include/shortcode.php';
}

?>

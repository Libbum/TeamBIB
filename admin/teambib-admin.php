<?php

add_action('admin_menu', 'teambib_config');

function teambib_config() {
    add_menu_page('TeamBIB Configuration', 'TeamBIB', 'manage_options', 'teambib', 'teambib_admin_page');
}

add_action('admin_init', 'teambib_init');

function teambib_init() {
    add_settings_section('team-members', 'Team Members', '', 'teambib');
    register_setting('teambib', 'member-list');
    add_settings_field('member-list', 'Member List Key', 'teambib_members_cb', 'teambib', 'team-members');

    add_settings_section('zotero-connection', 'Zotero Settings', '', 'teambib');
    register_setting('teambib', 'group-id');
    add_settings_field('group-id', 'Group ID', 'teambib_zotero_group_cb', 'teambib', 'zotero-connection');
    register_setting('teambib', 'collection-id');
    add_settings_field('collection-id', 'Collection ID', 'teambib_zotero_collection_cb', 'teambib', 'zotero-connection');
    register_setting('teambib', 'last-checked-version');
    add_settings_field('last-checked-version', 'Last Checked Version', 'teambib_zotero_version_cb', 'teambib', 'zotero-connection');
    register_setting('teambib', 'auth');
    add_settings_field('auth', 'Private Key', 'teambib_zotero_auth_cb', 'teambib', 'zotero-connection');
}

function teambib_members_cb() {
    $members = esc_attr(get_option('member-list', ''));
?>
<div id="titlediv">
    <input id="title" type="text" name="member-list" value="<?php echo $members; ?>">
</div>

<?php
}

function teambib_zotero_group_cb() {
    $value = esc_attr(get_option('group-id', ''));
?>
<div id="titlediv">
    <input id="title" type="text" name="group-id" value="<?php echo $value; ?>">
</div>

<?php
}

function teambib_zotero_collection_cb() {
    $value = esc_attr(get_option('collection-id', ''));
?>
<div id="titlediv">
    <input id="title" type="text" name="collection-id" value="<?php echo $value; ?>">
</div>

<?php
}

function teambib_zotero_version_cb() {
    $value = esc_attr(get_option('last-checked-version', '0'));
?>
<div id="titlediv">
    <input id="title" type="text" name="last-checked-version" value="<?php echo $value; ?>">
</div>

<?php
}

function teambib_zotero_auth_cb() {
    $value = esc_attr(get_option('auth', ''));
?>
<div id="titlediv">
    <input id="title" type="text" name="auth" value="<?php echo $value; ?>">
</div>

<?php
}

function teambib_admin_page() {
?>
    <div class="wrap">
        <?php settings_errors();?>
        <form method="POST" action="options.php">
                    <?php settings_fields('teambib');?>
                    <?php do_settings_sections('teambib')?>
                    <?php submit_button();?>
        </form>
    </div>
<?php
}

?>

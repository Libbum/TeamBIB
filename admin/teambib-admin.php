<?php

add_action('admin_menu', 'teambib_config');

function teambib_config() {
    add_menu_page('TeamBIB Configuration', 'TeamBIB', 'manage_options', 'teambib', 'admin_page');
}

add_action('admin_init', 'init');

function init() {
    add_settings_section('team-members', 'Team Members', '', 'teambib');

    register_setting('teambib', 'members');

    add_settings_field('members', 'Member List', 'members_cb', 'teambib', 'team-members');
}

function members_cb() {
    $members = esc_attr(get_option('members', ''));
?>
<div id="titlediv">
    <input id="title" type="text" name="members" value="<?php echo $members; ?>">
</div>

<?php
}

function admin_page() {
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

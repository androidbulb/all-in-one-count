<?php

// Add a new menu item in the WordPress dashboard
function aic_create_admin_menu() {
    add_menu_page(
        'All in One Count Settings',
        'All in One Count',
        'manage_options',
        'aic-settings',
        'aic_settings_page_content',
        'dashicons-chart-line',
        110
    );
}
add_action( 'admin_menu', 'aic_create_admin_menu' );

// Callback function for settings page content
function aic_settings_page_content() {
    // Save settings when the form is submitted
    if ( isset( $_POST['aic_save_settings'] ) ) {
        update_option( 'aic_display_user_count', isset( $_POST['aic_display_user_count'] ) ? 'yes' : 'no' );
        update_option( 'aic_display_visitor_count', isset( $_POST['aic_display_visitor_count'] ) ? 'yes' : 'no' );
        echo '<div class="notice notice-success is-dismissible"><p>Settings saved successfully!</p></div>';
    }

    $user_count_enabled = get_option( 'aic_display_user_count' );
    $visitor_count_enabled = get_option( 'aic_display_visitor_count' );

    ?>
    <div class="wrap">
        <h1>All in One Count Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">Display Total Registered Users Count</th>
                    <td>
                        <input type="checkbox" name="aic_display_user_count" <?php checked( $user_count_enabled, 'yes' ); ?> />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Display Total Visitor Count</th>
                    <td>
                        <input type="checkbox" name="aic_display_visitor_count" <?php checked( $visitor_count_enabled, 'yes' ); ?> />
                    </td>
                </tr>
            </table>
            <p>
                <input type="submit" name="aic_save_settings" class="button button-primary" value="Save Settings" />
            </p>
        </form>

        <h2>Shortcodes</h2>
        <p>To display the total registered user count, use: <code>[No_of_registered_users]</code></p>
        <p>To display the total visitor count, use: <code>[visitor_count]</code></p>
    </div>
    <?php
}

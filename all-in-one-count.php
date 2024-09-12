<?php
/*
Plugin Name: All in One Count
Plugin URI: https://github.com/androidbulb/all-in-one-count
Description: This is a plugin for ALL in One Count for showing registered user count and visitor count using shortcodes and this is open source plugin.
Version: 1.0.0
Author: Rajendra Kumar Dangi
Author URI: https://github.com/androidbulb
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Enqueue Admin Styles
function aic_enqueue_admin_styles() {
    wp_enqueue_style( 'aic-admin-css', plugin_dir_url( __FILE__ ) . 'assets/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'aic_enqueue_admin_styles' );

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'includes/settings-page.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';

// Plugin activation: register default settings
function aic_activate_plugin() {
    add_option( 'aic_display_user_count', 'yes' );
    add_option( 'aic_display_visitor_count', 'yes' );
}
register_activation_hook( __FILE__, 'aic_activate_plugin' );

// Plugin deactivation: clean up settings
function aic_deactivate_plugin() {
    delete_option( 'aic_display_user_count' );
    delete_option( 'aic_display_visitor_count' );
}
register_deactivation_hook( __FILE__, 'aic_deactivate_plugin' );

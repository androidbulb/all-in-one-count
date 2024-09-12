<?php

// Shortcode for displaying the total number of registered users (only the number)
function aic_display_registered_users() {
    if ( get_option( 'aic_display_user_count' ) === 'yes' ) {
        $user_count = count_users();
        return $user_count['total_users']; // Return only the number
    }
    return ''; // Return nothing if the feature is off
}
add_shortcode( 'No_of_registered_users', 'aic_display_registered_users' );

// Shortcode for displaying the total visitor count (only the number)
function aic_display_visitor_count() {
    if ( get_option( 'aic_display_visitor_count' ) === 'yes' ) {
        $visitor_count = get_transient( 'aic_visitor_count' ) ? get_transient( 'aic_visitor_count' ) : 0;
        return $visitor_count; // Return only the number
    }
    return ''; // Return nothing if the feature is off
}
add_shortcode( 'visitor_count', 'aic_display_visitor_count' );

// Track visitor count using transients
function aic_track_visitors() {
    $visitor_count = get_transient( 'aic_visitor_count' ) ? get_transient( 'aic_visitor_count' ) : 0;
    $visitor_count++;
    set_transient( 'aic_visitor_count', $visitor_count, DAY_IN_SECONDS );
}
add_action( 'wp', 'aic_track_visitors' );

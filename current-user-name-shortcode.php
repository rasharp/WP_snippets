<?php // only copy this line if needed


function display_current_user_name () {
    $user = wp_get_current_user();
    return $user->user_login;
}

add_shortcode('current_user_display_name', 'display_current_user_name');
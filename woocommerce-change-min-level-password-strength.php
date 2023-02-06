<?php // only copy this line if needed

/**
 * Change the strength level on the woocommerce password
 *
 * Strength Settings
 * 4 = Strong
 * 3 = Medium (default) 
 * 2 = Also Weak but a little stronger 
 * 1 = Password should be at least Weak
 * 0 = Very Weak / Anything
 */
add_filter( 'woocommerce_min_password_strength', 'webroom_change_password_strength' );
 
function webroom_change_password_strength( $strength ) {
	 return 1;
}
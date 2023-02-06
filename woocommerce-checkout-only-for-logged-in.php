<?php // only copy this line if needed

/**
 * Function for `woocommerce_before_checkout_form` action-hook.
 * 
 * @param  $checkout 
 *
 * @return void
 */
function wp_kama_woocommerce_before_checkout_form_action( $checkout ){

	if (!is_user_logged_in()) {
		// Redirecting to your custom login area
        wp_redirect('/my-account');
        // always use exit after wp_redirect() function.
        exit;
	}
}

add_action( 'woocommerce_before_checkout_form', 'wp_kama_woocommerce_before_checkout_form_action' );

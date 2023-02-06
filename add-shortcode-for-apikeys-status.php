<?php // only copy this line if needed

/**
* Returns a settings array for a membership to be used in members area output.
* From Woocommerce membership Members_Area.php
* 
* @since 1.9.0
*
* @param \WC_Memberships_User_Membership $user_membership the membership to get settings for
* @return array
*/

function get_apikeys_status( $customer_membership ) {
	
	$details = array(
		array(
			'label'   => __( 'WB API key 1', 'woocommerce-memberships' ),
			'content' => get_user_meta(get_current_user_id(), "_wc_memberships_profile_field_wb_api_0_status", true),
			'class'   => 'my-membership-detail-user-membership-fresh-date',
		),
		array(
			'label'   => __( 'WB API key 2', 'woocommerce-memberships' ),
			'content' => get_user_meta(get_current_user_id(), "_wc_memberships_profile_field_wb_api_1_status", true),
			'class'   => 'my-membership-detail-user-membership-fresh-date',
		),
		array(
			'label'   => __( 'WB API key 3', 'woocommerce-memberships' ),
			'content' => get_user_meta(get_current_user_id(), "_wc_memberships_profile_field_wb_api_2_status", true),
			'class'   => 'my-membership-detail-user-membership-fresh-date',
		),
	);

	return $details;
}


/**
 * Creates a shortcode to output the "My API keys status" table anywhere on the site
 *
 * Use the shortcode: [wcm_apikeys_status]
 *
 * @return void|string buffered HTML contents
 */

function sv_wcm_apikeys_status_shortcode() {

	// bail if Memberships isn't active or we're in the admin
	if ( ! function_exists( 'wc_memberships' ) || is_admin() || ! is_user_logged_in()) {
		return;
	}
	
	$customer_membership = wc_memberships_get_user_memberships();
	if (! is_array($customer_membership) || count($customer_membership) == 0) {
		return;
	}
	
	$apikeys_status = get_apikeys_status( $customer_membership );

	// buffer contents
	ob_start();
	?>

	<div class="woocommerce wb-api-keys">
	<?php
		wc_get_template( 'my-profile-details.php', array(
				'apikeys_status' => $apikeys_status,
			));
	?>
	</div>

	<?php
	// output buffered content
	return ob_get_clean();
}

add_shortcode( 'wcm_apikeys_status', 'sv_wcm_apikeys_status_shortcode' );
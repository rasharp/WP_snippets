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

function get_members_area_user_membership_details( $user_membership ) {

	$details = array(
		'status' => array(
			'label'   => __( 'Status', 'woocommerce-memberships' ),
			'content' => wc_memberships_get_user_membership_status_name( $user_membership->get_status() ),
			'class'   => 'my-membership-detail-user-membership-status',
		),
		'start-date' => array(
			'label'   => __( 'Start Date', 'woocommerce-memberships' ),
			'content' => $user_membership->has_start_date() ? date_i18n( wc_date_format(), $user_membership->get_local_start_date( 'timestamp' ) ) : esc_html__( 'N/A', 'woocommerce-memberships' ),
			'class'   => 'my-membership-detail-user-membership-start-date',
		),
		'expires' => array(
			'label'   => __( 'Expires', 'woocommerce-memberships' ),
			'content' => $user_membership->has_end_date() ? date_i18n( wc_date_format(), $user_membership->get_local_end_date( 'timestamp' ) ) : esc_html__( 'N/A', 'woocommerce-memberships' ),
			'class'   => 'my-membership-detail-user-membership-expires',
		),
		'actions' => array(
			'label'   => __( 'Actions', 'woocommerce-memberships' ),
			'content' => wc_memberships_get_members_area_action_links( 'my-membership-details', $user_membership ),
			'class'   => 'my-membership-detail-user-membership-actions',
		),
	);

	/**
		 * Filters the members area current membership details.
		 *
		 * @since 1.9.0
		 *
		 * @param array $details associative array of settings labels and HTML content for each row
		 * @param \WC_Memberships_User_Membership $user_membership the user membership the details are for
		 */
	return apply_filters( 'wc_memberships_members_area_my_membership_details', $details, $user_membership );
}


/**
 * Creates a shortcode to output the "My Memberships Details" table anywhere on the site
 *
 * Use the shortcode: [wcm_my_memberships_details]
 *
 * @return void|string buffered HTML contents
 */

function sv_wcm_my_memberships_content_shortcode() {

	// bail if Memberships isn't active or we're in the admin
	if ( ! function_exists( 'wc_memberships' ) || is_admin() || ! is_user_logged_in()) {
		return;
	}

	// buffer contents
	ob_start();
	$customer_membership = wc_memberships_get_user_memberships()[0];
	?>
	<div class="woocommerce">
	<?php
		wc_get_template( 'myaccount/my-membership-details.php', array(
				'customer_membership' => $customer_membership,
				'membership_details' => get_members_area_user_membership_details($customer_membership),
			) );
	?>
	</div>
	<?php
	// output buffered content
	return ob_get_clean();
}

add_shortcode( 'wcm_my_memberships_details', 'sv_wcm_my_memberships_content_shortcode' );
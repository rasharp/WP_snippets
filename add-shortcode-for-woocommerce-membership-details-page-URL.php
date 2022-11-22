<?php // only copy this line if needed

/**
 * Creates a shortcode to page "My Memberships Details" table
 *
 * Use the shortcode: [wcm_my_memberships_details_URL]
 *
 * @return URL for membership details page
 */
function sv_wc_memberships_my_memberships_details_URL_shortcode() {

	// bail if Memberships isn't active or we're in the admin
	if ( ! function_exists( 'wc_memberships' ) || is_admin() || ! is_user_logged_in()) {
		return;
	}
	
	$membership = wc_memberships_get_user_memberships()[0];
	
	if ( is_null($membership) ) {
		return get_site_url(null, '/my-account/members-area/');
	}

	return get_site_url(null, '/my-account/members-area/') . $membership->get_plan()->get_id() . '/my-membership-details/';
}

add_shortcode( 'wcm_my_memberships_details_URL', 'sv_wc_memberships_my_memberships_details_URL_shortcode' );
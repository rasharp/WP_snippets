<?php // only copy this line if needed


function sv_wc_memberships_my_memberships_details_URL_shortcode() {

	// bail if Memberships isn't active or we're in the admin
	if ( ! function_exists( 'wc_memberships' ) || is_admin() ) {
		return;
	}
	
	return get_site_url(null, '/my-account/members-area/') . wc_memberships_get_user_memberships()[0]->get_plan()->get_id() . '/my-membership-details/';
}
<?php // only copy this line if needed

/**
 * Add the user membership ID to the members area > details.
 *
 * @param array $details associative array of settings labels and HTML content for each row
 * @param \WC_Memberships_User_Membership $membership the user membership the details are for
 * @return array the updated details
 */

function sv_wcm_add_custom_details_to_my_account($details, $membership) {
	$new_details = [
		'member_id' => [
			'label'   => __( 'ID', 'my-textdomain' ),
			'content' => $membership->get_id(),
			'class'   => 'my-membership-detail-user-membership-id',
		],
		'member_plan' => [
			'label'   => __( 'Текущий тариф', 'my-textdomain' ),
			'content' => $membership->get_plan()->get_name(),
			'class'   => 'my-membership-detail-user-membership-plan-name',
		],
	];

	foreach ( $details as $detail ) {
		$new_details[] = $detail;
	}

	return $new_details;
}
add_filter( 'wc_memberships_members_area_my_membership_details', sv_wcm_add_custom_details_to_my_account, 10, 2 );
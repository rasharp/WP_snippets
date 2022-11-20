<?php // only copy this line if needed

/**
 * Remove button from the My Subscriptions table. It only removes button, don't disable possibility at all
 *
 * @param array $actions the array of subscription action links
 * @return array $actions the updated array of actions
 */

function sv_wcs_remove_my_subscriptions_button( $actions, $subscription ) {
 
 // unset( $actions['change_payment_method'] );  // Hide "Change Payment Method" button?

 // unset( $actions['change_address'] );  // Hide "Change Address" button?

 // unset( $actions['switch'] );  // Hide "Switch Subscription" button?

 // unset( $actions['resubscribe'] );  // Hide "Resubscribe" button from an expired or cancelled subscription?

 // unset( $actions['pay'] );  // Hide "Pay" button on subscriptions that are "on-hold" as they require payment?

 // unset( $actions['reactivate'] );  // Hide "Reactive" button on subscriptions that are "on-hold"?

 unset( $actions['cancel'] );  // Hide "Cancel" button on subscriptions that are "active" or "on-hold"?

 return $actions;
}

add_filter( 'wcs_view_subscription_actions', 'sv_wcs_remove_my_subscriptions_button', 100, 2 );
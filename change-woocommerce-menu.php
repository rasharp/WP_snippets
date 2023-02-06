<?php // only copy this line if needed

/**
* Edit my account menu order
*/

function my_account_menu_order() {
   $menuOrder = array(
      'dashboard' => __( 'Dashboard', 'woocommerce' ),
      'orders' => __( 'Orders', 'woocommerce' ),
      'downloads' => __( 'Download', 'woocommerce' ),
      'edit-address' => __( 'Addresses', 'woocommerce' ),
      'edit-account' => __( 'Account Details', 'woocommerce' ),
      'customer-logout' => __( 'Logout', 'woocommerce' ),
  );
   return $menuOrder;
}

add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );
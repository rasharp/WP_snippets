<?php  // only copy this line if needed

/**
 * Hook: Empty cart before adding a new product to cart
 **/

function remove_cart_item_before_add_to_cart( $passed, $product_id, $quantity ) {
    if( ! WC()->cart->is_empty() )
        WC()->cart->empty_cart();
    return $passed;
}

add_filter( 'woocommerce_add_to_cart_validation', 'remove_cart_item_before_add_to_cart', 20, 3 );

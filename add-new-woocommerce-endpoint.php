<?php // only copy this line if needed

/**
* Register new endpoints to use inside My Account page.
*/
function my_account_new_endpoints() {
    // Add for each new endpoint
    add_rewrite_endpoint( 'myendpoint', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'my_account_new_endpoints' );


/**
* Get new endpoint content
*/
// Replace 'myendpoint' with your endpoint/template name
// File myendpoint_php_template.php should be in child theme folder
function my_endpoint_content() {
    get_template_part('myendpoint_php_template');
}

add_action( 'woocommerce_account_myendpoint_endpoint', 'my_endpoint_content' );

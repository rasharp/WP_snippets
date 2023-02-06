<?php // only copy this line if needed

/**
 * Сниппет скрывает shipping address со страницы ввода адресов. Не нужен!!!
 * !!! Проще сделать в настройках Woocomerce - Настройки - Доставка - Параметры доставки - Принудительная доставка по плат.адресу
 * 
**/

function filter_wc_my_account_get_addresses( $adresses, $customer_id ) { 
    if( isset($adresses['shipping']) ) {
        unset($adresses['shipping']);
    }
    
    return $adresses; 
}

add_filter( 'woocommerce_my_account_get_addresses', 'filter_wc_my_account_get_addresses', 10, 2 ); 
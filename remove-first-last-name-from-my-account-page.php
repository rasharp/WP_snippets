<?php // only copy this line if needed

/**
 * ВАЖНО, сниппет лишь снимает свойство Required, а не управляет отображением элементов.
 * Чтобы элементы пропали со страницы My Account НЕОБХОДИМО
 * ДОБАВИТЬ CSS в свойства Custom CSS отображения элемента, содержащего шорткод [woocommerce_my_account] 
 *
.woocommerce-EditAccountForm .woocommerce-form-row--first {
  display: none;
}
.woocommerce-EditAccountForm .woocommerce-form-row--last {
  display: none;
}
 * 
**/



function sv_wc_remove_required_fields( $required_fields ) {
    unset($required_fields['account_first_name']);
    unset($required_fields['account_last_name']);

    return $required_fields;
}

add_filter('woocommerce_save_account_details_required_fields', 'sv_wc_remove_required_fields');

<?php // only copy this line if needed

/**
 * WooCommerce Memberships CUSTOM page for status of API keys
 *
 * @author    VerBlood based on WC Membership by SkyVerge
 * @copyright Copyright (c) 2014-2021, SkyVerge, Inc. (info@skyverge.com)
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * Displays information on the current api keys.
 *
 * @type array $apikey_status associative array of settings data
 *
 * @version 1.13.0
 * @since 1.9.0
 */

if ( ! empty( $apikeys_status ) && is_array( $apikeys_status ) ) :

	?>
	<table class="shop_table shop_table_responsive my_account_orders my_account_memberships my_membership_settings">
		<thead>
			<tr>
				<th colspan="2"><?php esc_html_e( 'Статус импорта API', 'woocommerce-memberships' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $apikeys_status as $setting_id => $data ) : ?>
				<tr class="<?php echo sanitize_html_class( $data['class'] ); ?>">
					<td><?php echo esc_html( $data['label'] ); ?></td>
					<td><?php echo $data['content']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php

endif;


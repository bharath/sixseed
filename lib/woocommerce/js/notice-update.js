/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 2.3.0
 *
 * @author Bharath
 * @license GPL-2.0-or-later
 * @package Sixseed
 */

jQuery( document ).on(
	'click', '.sixseed-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'sixseed_dismiss_woocommerce_notice'
				}
			}
		);

	}
);

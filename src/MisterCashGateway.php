<?php

/**
 * Title: WooCommerce Mister Cash gateway
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.2.7
 * @since 1.0.0
 */
class Pronamic_WP_Pay_Extensions_WooCommerce_MisterCashGateway extends Pronamic_WP_Pay_Extensions_WooCommerce_Gateway {
	/**
	 * The unique ID of this payment gateway
	 *
	 * @var string
	 */
	const ID = 'pronamic_pay_mister_cash';

	//////////////////////////////////////////////////

	/**
	 * Constructs and initialize an iDEAL gateway
	 */
	public function __construct() {
		$this->id             = self::ID;
		$this->method_title   = __( 'Bancontact', 'pronamic_ideal' );
		$this->payment_method = Pronamic_WP_Pay_PaymentMethods::BANCONTACT;

		// @since 1.2.7
		$this->order_button_text = __( 'Proceed to Bancontact', 'pronamic_ideal' );

		// @see https://github.com/woothemes/woocommerce/blob/v1.6.6/classes/gateways/class-wc-payment-gateway.php#L24
		$this->has_fields = false;

		parent::__construct();
	}

	/**
	 * Initialise form fields
	 */
	public function init_form_fields() {
		parent::init_form_fields();

		$description_prefix = '';

		if ( Pronamic_WP_Pay_Extensions_WooCommerce_WooCommerce::version_compare( '2.0.0', '<' ) ) {
			$description_prefix = '<br />';
		}

		$this->form_fields['icon']['default']     = plugins_url( 'images/bancontact/wc-icon.png', Pronamic_WP_Pay_Plugin::$file );
		$this->form_fields['icon']['description'] = sprintf(
			'%s%s<br />%s',
			$description_prefix,
			__( 'This controls the icon which the user sees during checkout.', 'pronamic_ideal' ),
			sprintf( __( 'Default: <code>%s</code>.', 'pronamic_ideal' ), $this->form_fields['icon']['default'] )
		);
	}
}

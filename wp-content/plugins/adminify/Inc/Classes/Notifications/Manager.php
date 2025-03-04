<?php
namespace WPAdminify\Inc\Classes\Notifications;

use WPAdminify\Inc\Classes\Notifications\Base\Data;

// No, Direct access Sir !!!
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Notice Manager
 *
 * Jewel Theme <support@jeweltheme.com>
 */
class Manager extends Data {

	/**
	 * Constructor method
	 *
	 * @author Jewel Theme <support@jeweltheme.com>
	 */
	public function __construct() {

		// Register Latest_Updates Notice.
		$this->register( new Latest_Updates() );

		// Register Ask_For_Rating Notice.
		$this->register( new Ask_For_Rating() );

		// Register Subscribe Notice .
		$this->register( new Subscribe() );

		// Discount Coupon
		// $this->register( new Discount() );

		// Register What we Collect Notice .
		$this->register( new What_We_Collect() );

		// Module_Conflicts
		$this->register( new Module_Conflicts() );

		// Register Upgrade_Notice Notice for managing all notices .
		$this->register( new Upgrade_Notice() );
	}
}

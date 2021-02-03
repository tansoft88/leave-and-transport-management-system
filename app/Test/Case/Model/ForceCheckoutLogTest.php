<?php
App::uses('ForceCheckoutLog', 'Model');

/**
 * ForceCheckoutLog Test Case
 *
 */
class ForceCheckoutLogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.force_checkout_log', 'app.entry_point', 'app.checkin_out_log', 'app.checkin_user', 'app.checkout_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ForceCheckoutLog = ClassRegistry::init('ForceCheckoutLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ForceCheckoutLog);

		parent::tearDown();
	}

}

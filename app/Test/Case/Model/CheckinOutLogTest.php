<?php
App::uses('CheckinOutLog', 'Model');

/**
 * CheckinOutLog Test Case
 *
 */
class CheckinOutLogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.checkin_out_log', 'app.entry_point', 'app.checkin_user', 'app.checkout_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CheckinOutLog = ClassRegistry::init('CheckinOutLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CheckinOutLog);

		parent::tearDown();
	}

}

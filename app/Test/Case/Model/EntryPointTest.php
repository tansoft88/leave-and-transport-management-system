<?php
App::uses('EntryPoint', 'Model');

/**
 * EntryPoint Test Case
 *
 */
class EntryPointTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.entry_point', 'app.checkin_out_log', 'app.checkin_user', 'app.checkout_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntryPoint = ClassRegistry::init('EntryPoint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntryPoint);

		parent::tearDown();
	}

}

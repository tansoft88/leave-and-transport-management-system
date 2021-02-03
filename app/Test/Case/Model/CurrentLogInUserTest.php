<?php
App::uses('CurrentLogInUser', 'Model');

/**
 * CurrentLogInUser Test Case
 *
 */
class CurrentLogInUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.current_log_in_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CurrentLogInUser = ClassRegistry::init('CurrentLogInUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CurrentLogInUser);

		parent::tearDown();
	}

}

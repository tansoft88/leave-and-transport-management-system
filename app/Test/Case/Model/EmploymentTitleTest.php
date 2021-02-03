<?php
App::uses('EmploymentTitle', 'Model');

/**
 * EmploymentTitle Test Case
 *
 */
class EmploymentTitleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.employment_title', 'app.staff_detail');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmploymentTitle = ClassRegistry::init('EmploymentTitle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmploymentTitle);

		parent::tearDown();
	}

}

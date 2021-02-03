<?php
App::uses('EmploymentJobTittle', 'Model');

/**
 * EmploymentJobTittle Test Case
 *
 */
class EmploymentJobTittleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.employment_job_tittle');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmploymentJobTittle = ClassRegistry::init('EmploymentJobTittle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmploymentJobTittle);

		parent::tearDown();
	}

}

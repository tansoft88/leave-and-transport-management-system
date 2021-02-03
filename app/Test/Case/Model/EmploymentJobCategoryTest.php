<?php
App::uses('EmploymentJobCategory', 'Model');

/**
 * EmploymentJobCategory Test Case
 *
 */
class EmploymentJobCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.employment_job_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmploymentJobCategory = ClassRegistry::init('EmploymentJobCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmploymentJobCategory);

		parent::tearDown();
	}

}

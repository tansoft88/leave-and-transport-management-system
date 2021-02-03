<?php
App::uses('FacultySubCategory', 'Model');

/**
 * FacultySubCategory Test Case
 *
 */
class FacultySubCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.faculty_sub_category', 'app.faculty');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacultySubCategory = ClassRegistry::init('FacultySubCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacultySubCategory);

		parent::tearDown();
	}

}

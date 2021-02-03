<?php
App::uses('SupplierCategory', 'Model');

/**
 * SupplierCategory Test Case
 *
 */
class SupplierCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.supplier_category', 'app.supply_master_category', 'app.supply_sub_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SupplierCategory = ClassRegistry::init('SupplierCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SupplierCategory);

		parent::tearDown();
	}

}

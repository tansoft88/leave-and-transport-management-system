<?php
/**
 * ForceCheckoutLogFixture
 *
 */
class ForceCheckoutLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'ecnumber' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'entry_point_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'forced_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'forced_reason' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'forced_by' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'ip_address' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'ecnumber' => 1,
			'entry_point_id' => 1,
			'forced_date' => '2018-03-08 10:34:30',
			'forced_reason' => 'Lorem ipsum dolor sit amet',
			'forced_by' => 1,
			'ip_address' => '2018-03-08 10:34:30'
		),
	);
}

<?php
/**
 * CheckinOutLogFixture
 *
 */
class CheckinOutLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'entry_point_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'ecnumber' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'time_in' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'checkin_user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'time_out' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'checkout_user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'ip_address' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'entry_point_id' => 1,
			'ecnumber' => 'Lorem ipsum dolor sit amet',
			'time_in' => '2018-03-07 10:15:10',
			'checkin_user_id' => 1,
			'time_out' => '2018-03-07 10:15:10',
			'checkout_user_id' => 1,
			'created' => '2018-03-07 10:15:10',
			'ip_address' => 'Lorem ipsum dolor sit amet'
		),
	);
}

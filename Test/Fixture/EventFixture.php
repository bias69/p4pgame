<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'fighter_1_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'fighter_2_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'fight_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'bets_close_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'result' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fighter_1_id' => array('column' => 'fighter_1_id', 'unique' => 0),
			'fighter_2_id' => array('column' => 'fighter_2_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'fighter_1_id' => 1,
			'fighter_2_id' => 1,
			'fight_date' => '2013-07-22',
			'bets_close_time' => '2013-07-22 17:25:31',
			'result' => 'Lorem ipsum dolor sit ame',
			'created' => '2013-07-22 17:25:31',
			'modified' => '2013-07-22 17:25:31'
		),
	);

}

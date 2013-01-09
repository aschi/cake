<?php
/**
 * VotingFixture
 *
 */
class VotingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'case_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'voting_start' => array('type' => 'date', 'null' => false, 'default' => null),
		'voting_end' => array('type' => 'date', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'case_id' => 1,
			'voting_start' => '2012-12-13',
			'voting_end' => '2012-12-13',
			'created' => '2012-12-13 03:39:22',
			'modified' => '2012-12-13 03:39:22'
		),
	);

}

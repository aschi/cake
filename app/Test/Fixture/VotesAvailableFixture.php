<?php
/**
 * VotesAvailableFixture
 *
 */
class VotesAvailableFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'votes_available';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'voting_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'novotes' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'voting_id' => 1,
			'novotes' => 1,
			'created' => '2012-12-13 03:42:01',
			'modified' => '2012-12-13 03:42:01'
		),
	);

}

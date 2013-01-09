<?php
App::uses('PlayerClub', 'Model');

/**
 * PlayerClub Test Case
 *
 */
class PlayerClubTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.player_club',
		'app.user',
		'app.group',
		'app.player',
		'app.player_position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlayerClub = ClassRegistry::init('PlayerClub');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayerClub);

		parent::tearDown();
	}

}

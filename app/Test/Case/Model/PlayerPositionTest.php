<?php
App::uses('PlayerPosition', 'Model');

/**
 * PlayerPosition Test Case
 *
 */
class PlayerPositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.player_position',
		'app.user',
		'app.group',
		'app.player'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlayerPosition = ClassRegistry::init('PlayerPosition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayerPosition);

		parent::tearDown();
	}

}

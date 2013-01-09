<?php
App::uses('Player', 'Model');

/**
 * Player Test Case
 *
 */
class PlayerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.player',
		'app.user',
		'app.group',
		'app.player_club',
		'app.player_position',
		'app.image',
		'app.case',
		'app.news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Player = ClassRegistry::init('Player');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Player);

		parent::tearDown();
	}

}

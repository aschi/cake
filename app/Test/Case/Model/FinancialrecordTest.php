<?php
App::uses('Booking', 'Model');

/**
 * Booking Test Case
 *
 */
class BookingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.Booking',
		'app.user',
		'app.group',
		'app.player',
		'app.player_club',
		'app.player_position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Booking = ClassRegistry::init('Booking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Booking);

		parent::tearDown();
	}

}

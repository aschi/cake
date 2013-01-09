<?php
App::uses('VotesAvailable', 'Model');

/**
 * VotesAvailable Test Case
 *
 */
class VotesAvailableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.votes_available',
		'app.user',
		'app.group',
		'app.voting',
		'app.case',
		'app.vote'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VotesAvailable = ClassRegistry::init('VotesAvailable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VotesAvailable);

		parent::tearDown();
	}

}

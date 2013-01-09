<?php
App::uses('Voting', 'Model');

/**
 * Voting Test Case
 *
 */
class VotingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.voting',
		'app.user',
		'app.group',
		'app.case',
		'app.vote',
		'app.votes_available'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Voting = ClassRegistry::init('Voting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Voting);

		parent::tearDown();
	}

}

<?php
App::uses('Vote', 'Model');

/**
 * Vote Test Case
 *
 */
class VoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vote',
		'app.user',
		'app.group',
		'app.voting',
		'app.case',
		'app.votes_available'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vote = ClassRegistry::init('Vote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vote);

		parent::tearDown();
	}

}

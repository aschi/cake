<?php
App::uses('Page', 'Model');

/**
 * Page Test Case
 *
 */
class PageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.page',
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
		$this->Page = ClassRegistry::init('Page');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Page);

		parent::tearDown();
	}

}

<?php
App::uses('BetsUser', 'Model');

/**
 * BetsUser Test Case
 *
 */
class BetsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bets_user',
		'app.bet',
		'app.event',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BetsUser = ClassRegistry::init('BetsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BetsUser);

		parent::tearDown();
	}

}

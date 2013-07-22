<?php
App::uses('EventsFighter', 'Model');

/**
 * EventsFighter Test Case
 *
 */
class EventsFighterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.events_fighter',
		'app.event',
		'app.bet',
		'app.user',
		'app.code',
		'app.bets_user',
		'app.fighter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsFighter = ClassRegistry::init('EventsFighter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsFighter);

		parent::tearDown();
	}

}

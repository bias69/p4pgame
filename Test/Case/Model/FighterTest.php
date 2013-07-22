<?php
App::uses('Fighter', 'Model');

/**
 * Fighter Test Case
 *
 */
class FighterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fighter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fighter = ClassRegistry::init('Fighter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fighter);

		parent::tearDown();
	}

}

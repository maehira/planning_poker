<?php
App::uses('Backlog', 'Model');

/**
 * Backlog Test Case
 *
 */
class BacklogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.backlog',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Backlog = ClassRegistry::init('Backlog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Backlog);

		parent::tearDown();
	}

}

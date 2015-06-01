<?php

use App\Group;

class GroupControllerTest extends TestCase {

	protected $mock;

	private $id_test;

	/**
	 * set up start
	 */
	public function setUp() {
		parent::setUp();
		Session::start();
		// $this->mock = \Mockery::mock('\App\Group');
		$this->id_test = Group::all()->first()->id;
	}

	/**
	 * Test get function index response 200
	 * @return [type] [description]
	 */
	public function testIndex() {
		// $this->mock
		//        ->shouldReceive('all')
		//        ->once();
		// $this->app->instance('\App\Group', $this->mock);

		$response = $this->call('GET', 'groups');
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertViewHas('groups');
	}

	/**
	 * Test function create match route
	 * @return [type] [description]
	 */
	public function testCreate() {
		$response = $this->call('GET', 'groups/create');
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Test function edit get
	 * @return [type] [description]
	 */
	public function testEdit() {

		// $this->mock
		//    ->shouldReceive('find')
		//    ->once();

		// $this->app->instance('\App\Group', $this->mock);

		$response = $this->call('GET', 'groups/' . $this->id_test);
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertViewHas('groups');
	}

	/**
	 * Test update receive data post
	 * @return [type] [description]
	 */
	public function testUpdate() {
		// $this->mock
		//    ->shouldReceive('find')
		//    ->once();
		// $this->app->instance('\App\Group', $this->mock);

		$params = [
			'_token' => csrf_token(), // Retrieve current csrf token
			'groupname' => 'voi qua nhe' . rand(),
			'description' => 'description hay ne',
		];
		$response = $this->call('PUT', 'groups/' . $this->id_test, $params);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedToRoute('groups.index');
	}

	/**
	 * Test insert group receive data post
	 * @return [type] [description]
	 */
	public function testStore() {
		$params = [
			'_token' => csrf_token(), // Retrieve current csrf token
			'groupname' => 'Tan SV sds' . rand(),
			'description' => 'description ne',
		];

		$response = $this->call('POST', '/groups', $params);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedToRoute('groups.index');
	}

	/**
	 * Test delete
	 * @return [type] [description]
	 */
	public function testDestroy() {
		$params = [
			'_token' => csrf_token(), // Retrieve current csrf token
			'_method' => 'delete',
		];
		$response = $this->call('DELETE', '/groups/' . $this->id_test, $params);
		$this->assertEquals(302, $response->getStatusCode());
	}

	/**
	 * Shutdown this testcase
	 * @return [type] [description]
	 */
	public function tearDown() {
		parent::tearDown();
		//Mockery::close();
	}
}

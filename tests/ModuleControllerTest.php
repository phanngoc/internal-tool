<?php
use App\Module;

class ModuleControllerTest extends TestCase {
	public $mock;

	private $id_test;

	/**
	 * set up start
	 */
	public function setUp() {
		parent::setUp();
		Session::start();
		// $this->mock = Mockery::mock('\App\Group');
		$this->id_test = Module::all()->first()->id;
	}
	public function testIndex() {
		$response = $this->call('GET', 'modules');
		$this->assertEquals(200, $response->getStatusCode());
	}
	public function testCreate() {
		$response = $this->call('GET', 'modules/create');
		$this->assertEquals(200, $response->getStatusCode());
	}
	public function testStore() {
		$params = [
			'_token' => csrf_token(), // Retrieve current csrf token
			'modulename' => 'modulename test',
			'description' => 'description module test',
			'version' => '1.1',
		];
		$response = $this->call('POST', 'modules/', $params);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedToRoute('modules.index');

	}
	public function testEdit() {
		$response = $this->call('GET', 'modules/' . $this->id_test);
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertViewHas('modules');
	}
	public function testUpdate() {
		$params = [
			'_token' => csrf_token(), // Retrieve current csrf token
			'modulename' => 'modulename 1123',
			'description' => 'description module 123',
			'version' => '1.1',
		];
		$response = $this->call('PUT', 'modules/' . $this->id_test, $params);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertRedirectedToRoute('modules.index');
	}
	public function testDestroy() {
		$params = [
			'_token' => csrf_token(), // Retrieve current csrf token
			'_method' => 'delete',
		];
		$response = $this->call('DELETE', 'modules/' . $this->id_test, $params);
		$this->assertEquals(302, $response->getStatusCode());
	}

}
?>
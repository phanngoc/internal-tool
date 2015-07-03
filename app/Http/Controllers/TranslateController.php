<?php namespace App\Http\Controllers;
use File;
use Input;
use Request;
class TranslateController extends AdminController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$namefile = '';
		if(Request::input('filename'))
		{
			$namefile = Request::input('filename');	
		}
		else
		{
			$namefile = 'messages.php';	
		}
		$filesobj = File::files(base_path() .'/resources/lang/en/');
		$files = array();
		foreach ($filesobj as $key => $value) {
			array_push($files,basename($value)); 
		}

		$tienganh = File::getRequire(base_path() . '/resources/lang/en/'.$namefile);
		$mangonngu = array();
		foreach ($tienganh as $key => $value) {
			$mangonngu[] = $key;
		}
		$tiengnhat = File::getRequire(base_path() . '/resources/lang/jp/'.$namefile);


		return view('translate', compact('tienganh', 'tiengnhat', 'mangonngu','files'));
	}
	public function create() {

	}

	public function store() {

	}

	public function show() {

	}

	public function edit($id) {

	}

	public function update() {
		$namefile = '';
		if(Request::input('filename'))
		{
			$namefile = Request::input('filename');	
		}
		else
		{
			$namefile = 'messages.php';	
		}

		$nhat = Input::get('nhat');
		$key = Input::get('key');
		$tiengnhat = array_combine($key, $nhat);
		$fileName = base_path() . '/resources/lang/jp/'.$namefile;
		file_put_contents($fileName, "<?php");
		file_put_contents($fileName, "\nreturn array(", FILE_APPEND);
		foreach ($tiengnhat as $k => $v) {
			file_put_contents($fileName, "\n'" . $k . "'=>'" . $v . "',", FILE_APPEND);
		}
		file_put_contents($fileName, "\n);", FILE_APPEND);
		file_put_contents($fileName, "?>", FILE_APPEND);
		return redirect()->route('languages.index');
	}
	public function destroy($id) {
	}
}
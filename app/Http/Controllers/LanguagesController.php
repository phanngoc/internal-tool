<?php namespace App\Http\Controllers;

use App\Language;
use File;

class LanguagesController extends AdminController {

	/**
	 * Display list language
	 * @return Response
	 */
	public function index() {
		$languages = Language::all();
		$filesobj = File::files(base_path() .'/resources/lang/en/');
		$files = array();
		$count_nhat = 0;
		$count_english = 0;
		foreach ($filesobj as $key => $value) {
			$namefile = basename($value);
			$tienganh = File::getRequire(base_path() . '/resources/lang/en/'.$namefile);
			$tiengnhat = File::getRequire(base_path() . '/resources/lang/jp/'.$namefile);

			foreach ($tienganh as $key => $value) {
				$count_english++;
				if (array_key_exists($key,$tiengnhat))
				{
				  if($tiengnhat[$key]!='')
					{
						$count_nhat++;
					}
				}	
			}		
		}
		$percent_language = round($count_nhat/$count_english * 100,0);
		return view('language', compact('languages','percent_language'));
	}

	/**
	 * Change language
	 * @param  $id
	 * @return Response view
	 */
	public function change($id) {
		$language = Language::find($id);
		Language::where('is_default', '=', 1)->update([
			'is_default' => 0,
		]);
		$language->is_default = 1;
		$language->save();

		return redirect()->route('languages.index');
	}

}

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
            //echo $namefile;
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

		//dd($count_english);
		$percent_language = round($count_nhat/$count_english * 100,0);
		return view('language', compact('languages','percent_language'));
	}

	/**
	 * Change language
	 * @param  $id
	 * @return Response
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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Show translate language
	 * @return Response
	 */
	public function show() {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}

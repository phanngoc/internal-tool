<?php namespace App\Http\Controllers;

use App\Language;
use File;
use Validator;
use Illuminate\Http\Request;

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
				$count_english ++;
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
	 * Language create.
	 * @return [type] [description]
	 */
	public function create() {
		return view('language.create');
	}

	/**
	 * Post data create language.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function store(Request $request) {
		
		$validator = Validator::make(
		    $request->all(),
		    Language::$rules
		);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors());
		}

		$language = Language::create($request->all());
		$languageCode = $language->code;
		$namefile = $language->filename;

		$pathDirectory = base_path() . '/resources/lang/'.$languageCode;
		if (!File::isDirectory($pathDirectory)) {
			File::makeDirectory($pathDirectory);
		}

		return redirect()->route('languages.index');
	}

	/**
	 * Language create.
	 * @return [type] [description]
	 */
	public function show($id) {
		$language = Language::find($id);
		return view('language.edit', compact('language'));
	}

	/**
	 * Post data create language.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function update(Request $request, $id) {
		
		$validator = Validator::make(
		    $request->all(),
		    Language::$rules
		);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors());
		}

		$language = Language::find($id)->update($request->all());

		return redirect()->route('languages.index');
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

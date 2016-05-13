<?php namespace App\Http\Controllers;
use File;
use Input;
use Request;
use App\Language;

class TranslateController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null) {

		if ($id == null) {
			$languageTranslate = Language::find(1);
		} else {
			$languageTranslate = Language::find($id);
		}

		$languageCode = $languageTranslate->code;
		$namefile = '';

		if (Request::input('filename'))
		{
			$namefile = Request::input('filename');	
		}
		else
		{
			$namefile = 'messages.php';	
		}

		$filesobj = File::files(base_path() .'/resources/lang/en');
		$files = array();
		
		foreach ($filesobj as $key => $pathFile) {

			array_push($files, basename($pathFile)); 
			
			$pathFileNewLanguage = base_path() .'/resources/lang/'.$languageCode.'/'.basename($pathFile);
			if (!File::exists($pathFileNewLanguage)) {

				File::put($pathFileNewLanguage, '<?php return array(); ?>');
			}
		}

		$tienganh = File::getRequire(base_path() . '/resources/lang/en/'.$namefile);
		$mangonngu = array();

		foreach ($tienganh as $key => $value) {
			$mangonngu[] = $key;
		}

		$languageNeedTranslate = File::getRequire(base_path() . '/resources/lang/'.$languageCode.'/'.$namefile);
		
		return view('translate', compact('tienganh', 'languageNeedTranslate', 'mangonngu', 'files', 'languageTranslate'));
	}

	/**
	 * Update translate english to japan 
	 *
	 * @return Response
	 */
	public function update(Request $request, $id) {

		if ($id == null) {
			$languageTranslate = Language::find(1);
		} else {
			$languageTranslate = Language::find($id);
		}

		$namefile = '';

		if (Request::input('filename'))
		{
			$namefile = Request::input('filename');	
		}
		else
		{
			$namefile = 'messages.php';	
		}

		$targetLanguage      = Input::get('targetLanguage');
		$keys       = Input::get('key');
		$arrTargetLanguage = array_combine($keys, $targetLanguage);

		$languageCode = $languageTranslate->code;

		$pathFile  = base_path() . '/resources/lang/'.$languageCode.'/'.$namefile;

		if (!File::exists($pathFile)) {
			File::put($pathFile, '');
		}

		file_put_contents($pathFile, "<?php");
		file_put_contents($pathFile, "\nreturn array(", FILE_APPEND);

		foreach ($arrTargetLanguage as $k => $v) {
			file_put_contents($pathFile, "\n'" . $k . "'=>'" . $v . "',", FILE_APPEND);
		}

		file_put_contents($pathFile, "\n);", FILE_APPEND);
		file_put_contents($pathFile, "?>", FILE_APPEND);

		return redirect()->route('languages.index');
	}
}
<?php namespace App\Http\Controllers;
class BaseController extends Controller {
	public function __construct()
	{
		// magic code
	}
	//base public view
	public function baseView($Childview,$Data)
	{
		\Blade::setRawTags('[[', ']]');
		\Blade::setContentTags('[[[', ']]]');
		\Blade::setEscapedContentTags('[[[', ']]]');
		$Data['ChildView'] = $Childview;
		return view('bases.body', $Data);
	}
}
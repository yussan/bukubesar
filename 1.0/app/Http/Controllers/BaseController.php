<?php 
namespace App\Http\Controllers;
use Session;
use App\Models\User;use App\Models\Usaha;use App\Models\Item;use App\Models\Personil;use App\Models\Persediaan;
class BaseController extends Controller {
	private $user;
	public function __construct()
	{
		$this->M_user = new User;
		$this->M_usaha = new Usaha;
		$this->M_item = new Item;
		$this->M_personil = new Personil;
		$this->M_persediaan = new Persediaan;
	}
	#BASE PUBLIC VIEW
	public function baseView($Childview,$Data)
	{
		\Blade::setRawTags('[[', ']]');
		\Blade::setContentTags('[[[', ']]]');
		\Blade::setEscapedContentTags('[[[', ']]]');
		$Data['ChildView'] = $Childview;
		return view('bases.body', $Data);
	}
}
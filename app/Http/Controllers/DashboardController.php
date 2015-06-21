<?php 
namespace App\Http\Controllers;
use Session;
use Crypt;
use App\Models\User;
use App\Models\Usaha;
use App\Models\Item;
class DashboardController extends BaseController {
	public function __construct()
	{
		parent::__construct();
		$this->M_user = new User;
		$this->M_usaha = new Usaha;
		$this->M_item = new Item;
	}
	#INDEX PAGE - NOTIFICATION - STATS
	public function index()
	{
		//user not logged in
		if(Session::has('userlogin')==false){return redirect('/');}
		$Data = array(
			'title'=>'Dashboard',
			'userdata'=>$this->M_user->userData('yussan'),
			'usaha'=>$this->M_usaha->getUsaha('yussan'),
			);
		return $this->baseView('dashboard.index',$Data);
	}
	#MANAJEMEN USAHA
	public function usaha($encidusaha)
	{
		//decrypt
		$idusaha = str_replace('','=',Crypt::decrypt($encidusaha));//worked
		$usaha = $this->M_usaha->detail($idusaha);
		$Data = array(
			'title'=> $usaha[0]->namaUsaha,
			'usaha'=> $usaha[0],//get detail of usaha
			'personil'=> $this->M_usaha->getPersonil($idusaha),
			//stats penjualan
			'totHPen'=>$this->M_item->totalHargaPenjualan($idusaha),
			//stats persediaan
			'totMerek'=>$this->M_item->totalMerek($idusaha),
			'totStok'=>$this->M_item->totalStok($idusaha),
			'totHP'=>$this->M_item->totalHargaJual($idusaha),
			);
		//get detail usaha
		return $this->baseView('dashboard.usaha',$Data);
	}
}

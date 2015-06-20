// ANGULAR
var app = angular.module('appBukuBesar',['ngRoute']);//angular initialize
//HOME CONTROLLER
app.controller('ctrlHome',['$scope',
	function(){
		
	}]);
//CASHIER CONTROLLER
app.controller('ctrlKasir',['$scope','$http','$location','$window','$timeout',
	function($scope,$http,$location,$window,$timeout){
	//STYLING
	$scope.hasilPencarian = true;
	var heightDoc = $window.innerHeight;//get document height
	$scope.sidebarLeft = {"height":heightDoc};//change left sidebar stye
	$scope.styleItemList = {"height":heightDoc-230};//change item list style
	$scope.boxVeryRight = {"height":heightDoc-322};//change item list style
	var loc = $location.absUrl();
	//SEARCH RESULT
	$scope.search = function()
	{
		$scope.searchLoader = '...';
		$timeout(function()
		{
			var keyword = $scope.txtItem;
			$scope.keyword = keyword;
			if(!keyword){$scope.hasilPencarian = true;}
			else{$scope.hasilPencarian = false;}
		},1000);
	};
	// $scope.hasilPencarian = true;
	//SHORTCUTS
	//ADD ITEM
	$scope.add = function()
	{
		alert(angular.element('.test'));
	};
	//WHEN WINDOW RESIZE
	//BUTTON ACTION
	//close transaction
	$scope.actTutup = function()
	{
		var agree = confirm('Anda Yakin');
		if(agree==true){alert('redirect');}
	};

	}]);
//INVENTORY CONTROLLER
app.controller('ctrlInventoriBarang',['$scope','$window',
	function($scope,$window){
		//STYLING
		var heightDoc = $window.innerHeight;//get document height
		$scope.search = true;
		$scope.sidebarLeft = {"height":heightDoc,"position":"fixed"};//change left sidebar stye
		//BUTTON ACTION
		$scope.showSearch = function()
		{
			$scope.search =$scope.search === false ? true :false
		};
		//ADD ITEM
		$scope.showAdd = function()
		{
			$scope.modalTitle = 'Tambah Barang';
			$scope.modalContent = 'Konten Modal';
			$('#myModal').modal('show');
		}
	}]);
//PERSONIL LIST
app.controller('ctrlPersonilList',['$scope','$window',
	function($scope,$window){
		//STYLING
		var heightDoc = $window.innerHeight;//get document height
		$scope.search = true;
		$scope.sidebarLeft = {"height":heightDoc,"position":"fixed"};//change left sidebar stye
		//BUTTON ACTION
		$scope.showSearch = function()
		{
			$scope.search =$scope.search === false ? true :false
		};
		//ADD ITEM
		$scope.showAdd = function()
		{
			$scope.modalTitle = 'Tambah Barang';
			$scope.modalContent = 'Konten Modal';
			$('#myModal').modal('show');
		}
	}]);
//HOME
app.controller('ctrlHome', ['$scope','$timeout',function($scope,$timeout){
	$scope.fixHeader = true;
	$scope.homePresentation = function(param)
	{
		switch(param){
			case 'personil':
			$scope.downArrowPersonil = true;$scope.downArrowPenjualan = false;$scope.downArrowPersediaan = false;$scope.downArrowAkuntansi = false;
			$scope.homeh2 = 'manajemen, dokumentasi dan merapikan aktifitas usaha.';
			$scope.homep = 'Khusus diciptakan untuk UKM(Usaha Kecil Mikro dan Menengah) untuk mengatasi berbagai masalah di bidang personil,penjualan,persediaan dan akuntansi. Data tersimpan di cloud sehingga memudahkan semua personil untuk mengaksesnya.';
			break;
			case 'penjualan':
			$scope.downArrowPersonil = false;$scope.downArrowPenjualan = true;$scope.downArrowPersediaan = false;$scope.downArrowAkuntansi = false;
			$scope.homeh2 = 'membantu proses penjualan lebih rapi dan tercatat dengan baik.';
			$scope.homep = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus, sapien ac imperdiet aliquam, felis nulla euismod risus, at consectetur ante est id nulla. Morbi bibendum, dui sit amet pulvinar venenatis, tellus ipsum feugiat erat, placerat lacinia dui lorem malesuada nunc. Etiam congue sed sem et imperdiet.';
			break;
			case 'persediaan':
			$scope.downArrowPersonil = false;$scope.downArrowPenjualan = false;$scope.downArrowPersediaan = true;$scope.downArrowAkuntansi = false;
			$scope.homeh2 = 'mengetahui persedian yang ada dan pemberitahuan untuk stok yang hampir habis.';
			$scope.homep = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus, sapien ac imperdiet aliquam, felis nulla euismod risus, at consectetur ante est id nulla. Morbi bibendum, dui sit amet pulvinar venenatis, tellus ipsum feugiat erat, placerat lacinia dui lorem malesuada nunc. Etiam congue sed sem et imperdiet.';
			break;
			case 'akuntansi':
			$scope.downArrowPersonil = false;$scope.downArrowPenjualan = false;$scope.downArrowPersediaan = false;$scope.downArrowAkuntansi = true;
			$scope.homeh2 = 'memberikan laporan yang valid untuk menentukan rencana kedepan usaha anda.';
			$scope.homep = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus, sapien ac imperdiet aliquam, felis nulla euismod risus, at consectetur ante est id nulla. Morbi bibendum, dui sit amet pulvinar venenatis, tellus ipsum feugiat erat, placerat lacinia dui lorem malesuada nunc. Etiam congue sed sem et imperdiet.';
			break;
		}
	}
	//auto
	$scope.homePresentation('personil')
}])
//GET STARTED
app.controller('ctrlGetStarted', ['$scope','$http','$window',function($scope,$http,$window){
	//automatic hide
	$scope.errordiv = $scope.loader = $scope.successdiv = true;
	//login-register
	$scope.btnLogin = function()
	{
		$scope.loader = false;
		if(!$scope.txtUsername || !$scope.txtPassword)//blank username / password
		{
			$scope.loader = true;//hidden loader
			$scope.errordiv = false;
			$scope.errormessage = 'username/password kosong';
		}else{
			var username = $scope.txtUsername;
			var password = $scope.txtPassword;
			//cek username and password into database
			var login=$http.post('ajax/loginverification',
				{username:username,password:password});
			login.success(function(response)
			{
				if(response==0){$scope.loader = true;$scope.errordiv = false;$scope.errormessage = 'username/password tidak cocok';}
				else{
					$scope.errordiv = true;
					$scope.successdiv =false;
					$scope.successmessage ='Login berhasil';
					//setup session
					var setSession = $http.post('ajax/setsession',{username:username,password:password});
					setSession.success(function(){$window.location = 'dashboard';});
					setSession.false(function(){alert('masalah set session, silahkan refresh halaman');});
				}//redirect to dashboard
			});
			login.error(function()
			{
				$scope.loader = true;//hidden loader
				$scope.errordiv = false;
				$scope.errormessage = 'terjadi masalah di sistem, silahkan refresh halaman';
			});
		}
	};
}])

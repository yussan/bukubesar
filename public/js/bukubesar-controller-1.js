// ANGULAR
var app = angular.module('appBukuBesar',['ngRoute','ngSanitize']);//angular initialize
//HOME
app.controller('ctrlHome', ['$scope','$timeout','$http',function($scope,$timeout,$http){
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
	//add mailist
	$scope.addEmailList = function()
	{
		var _this = $scope;
		var email = _this.TxtEmail;
		_this.AlertBox = false;_this.AlertClass = 'alert alert-warning';_this.AlertText = 'loading...';
		if(!email)//no input email
		{
			_this.AlertBox = false;_this.AlertClass = 'alert alert-danger';_this.AlertText = 'email kosong';

		}else//email processor
		{
			//save data
			url = rootweb+'/ajax/addmail';
			var ajax = $http.post(url,{email:email});
			//success
			ajax.success(function(response)
				{
					if(response=='success')
					{
						_this.AlertBox = false;_this.AlertClass = 'alert alert-success';_this.AlertText = 'email berhasil disimpan';
						$timeout(function(){_this.AlertBox = true;_this.TxtEmail='';},3000);
					}else{
						_this.AlertBox = false;_this.AlertClass = 'alert alert-danger';_this.AlertText = response;
					}
				});
			//error
			ajax.error(function()
				{
					_this.AlertBox = false;_this.AlertClass = 'alert alert-danger';_this.AlertText = 'gagal menyimpan, silahkan ulangi lagi';
					$timeout(function(){_this.AlertBox = true;_this.TxtEmail='';},3000);
				});			
		}
		// alert(_this.TxtEmail);

	};
	//check TxtEmail input
	$scope.checkInput = function()
	{
		var email = $scope.TxtEmail;
		if(!email){$scope.AlertBox = true;}
	};
	//auto
	$scope.homePresentation('personil')
}])
/**CASHIER CONTROLLER**/
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
/**END OF KASIR CONTROLLER**/

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
//CTRL USAHA
app.controller('ctrlUsaha',['$scope','$window','$http',
	function($scope,$window,$http){
		$scope.loader = true;
		//STYLING
		var heightDoc = $window.innerHeight;//get document height
		$scope.search = true;
		$scope.sidebarLeft = {"height":heightDoc,"position":"fixed","background":"rgb(111, 202, 236)"};//change left sidebar stye
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
		};
		//GOTO SECURE PAGE
		$scope.securePage = function(location)
		{	
			$scope.page = location;
			$('#securePageModal').modal('show');
		};
		//CHECK SECURE PAGE PASSWORD
		$scope.checkSecurePage = function(location)
		{
			$scope.loader = false;
			var password = $scope.password;
			var url = rootweb+'/ajax/security/passwordchecker'; 
			var ajax = $http.post(url,{password:password});
			ajax.success(function(response)
			{
				$scope.loader = true;
				$window.location = $scope.page;
			});
			ajax.error(function(){$scope.loader = true;alert('terjadi masalah');});
		};
	}]);
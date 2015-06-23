<?php $encidusaha = Request::segment(4);?>
<div ng-controller="ctrlPersonilList" ng-keypress="keyShortcut" class="box">

<!--LEFT-->
<div ng-style="sidebarLeft" class="box-personil-left col-md-2">
    <h2>BukuBesar</h2>
    <br/>
    @include('dashboard.personil.navbar')    
</div>
<div class="col-md-2"><p></p></div>
<!-- END OF LEFT -->
<div style="padding-right:0" class="col-md-10">
    <!--HEADER-->
    <div class="box-kasir-right col-md-12">
        <ol class="breadcrumb">
          <li><a style="color:gray" href="[[url('dashboard')]]">Dashboard</a></li>
          <li><a style="color:gray" href="[[url('dashboard/usaha')]]">Usaha</a></li>
          <li><a style="color:gray" href="[[url('dashboard/usaha/'.$encidusaha)]]">[[$usaha->namaUsaha]]</a></li>
          <li class="active">List</li>
      </ol>
      <!-- INPUT KASIR -->
      <div  class="box-kasir-right row">
        <div class="box-form">
            <div class="col-xs-12"><h1>Personil : List
                <button ng-click="showAdd()" type="button" class="btn btn-default box-personil-btn"><span class="glyphicon glyphicon-plus"></span></button>
                <button ng-click="showSearch()" type="button" class="btn btn-default box-personil-btn"><span class="glyphicon glyphicon-search"></span></button>
            </h1> 
        </div>
        <form class="col-xs-12" ng-hide="search" role="form">
            <div style="padding-left:0" class="col-xs-10">
                <input ng-keyup="search()" ng-model="txtItem" type="text" class="form-control" id="exampleInputEmail2" placeholder="Kode / Nama Barang" requried autofocus>
            </div>
            <div class="col-xs-2">
                <button ng-click="add()" type="button" class="btn btn-default box-personil-btn"><span class="glyphicon glyphicon-search"></span></button></div>
            </form>
        </div>
    </div>               
    <!-- LIST BARANG -->
    <br/>
    <div class="row">
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a ng-click="listPersonil()" href="#/semua" aria-controls="home" role="tab" data-toggle="tab">Semua</a></li>
    <li role="presentation"><a ng-click="listPersonil('penjualan')" href="#/penjualan" aria-controls="profile" role="tab" data-toggle="tab">Penjualan</a></li>
    <li role="presentation"><a ng-click="listPersonil('persediaan')" href="#/pesediaan" aria-controls="messages" role="tab" data-toggle="tab">Persediaan</a></li>
    <li role="presentation"><a ng-click="listPersonil('akuntansi')" href="#/akuntansi" aria-controls="settings" role="tab" data-toggle="tab">Akuntansi</a></li>
  </ul>
        <h4>{{total}}</h4>
        <div style="margin-top:10px" ng-hide="loader" class="alert alert-warning">loading...</div>
        <div style="margin-top:10px" ng-hide="errordiv" class="alert alert-warning">{{errormessage}}</div>
        <div ng-style="styleItemList" class="parent-list">
            <table class="table box-list">
                <tr ng-repeat="p in personils">
                    <td ng-click="activitiesPersonil(p.idPersonil,p.namaUser)" style="width:40px"><a id="link-avatar" class="avatar" data-toggle="dropdown" href="#"><img src="{{rootdir+'/images/avatar/'+p.avatar}}" alt="..." class="img-circle"></a></td>
                    <td ng-click="activitiesPersonil(p.idPersonil,p.namaUser)">{{p.username}}<br/>{{p.namaUser}}</td>
                    <td ng-click="activitiesPersonil(p.idPersonil,p.namaUser)"><strong>Bag</strong><br/>{{p.statusPersonil}}</td>
                    <td ng-click="activitiesPersonil(p.idPersonil,p.namaUser)"><strong>Terakhir Login</strong><br/>{{p.lastLoginPersonil}}</td>
                    <td ng-click="activitiesPersonil(p.idPersonil,p.namaUser)"><strong>Aktifitas Terakhir</strong><br/>{{p.lastActivityPersonil}}</td>
                    <td style="width:50px">
                        <a ng-click="deletePersonil(p.idPersonil)" style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn-small btn btn-circle btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                        <br/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>           
<!--HEADER-->
<!-- MODAL AKTIFITAS-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="color:gray" class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{modalTitle}}</h4>
            </div>
            <div style="max-height:350px;overflow-y: scroll;" class="modal-body">
                {{modalContent}}
                <br/><br/>
                <div ng-bind-html="modalBody"></div>
                <p ng-repeat="act in activities"><strong>{{act.datetime}}</strong> {{act.activity}}</p>
            </div>
            <div class="modal-footer" ng-bind-html="modalFooter"></div>
        </div>
    </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="color:gray" class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Personil</h4>
            </div>
            <div style="max-height:350px;overflow-y: scroll;" class="modal-body">
                <input ng-keyup="searchPersonil()" ng-model="keyword" class="form-control" type="text" placeholder="masukan username" autofocus>
                <small style="margin:10px 0">hasil pencarian : {{searchkey}}</small>
                <br/>
                <div ng-hide="searchloader" class="alert alert-warning">loading...</div>
                <table class="table box-list">
                <tr ng-repeat="s in searchresults">
                    <td style="width:40px"><a id="link-avatar" class="avatar" data-toggle="dropdown" href="#"><img src="{{rootdir+'/images/avatar/'+s.avatar}}" alt="..." class="img-circle"></a></td>
                    <td {{s.username}}<br/>{{s.username}}</td>
                    <td style="width:50px">
                        <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn-small btn btn-circle btn-primary" href="#"><span  class="glyphicon glyphicon-plus"></span></a> 
                        <br/>
                    </td>
                </tr>
                </table>
            </div>
            <div class="modal-footer"><a style="color:gray" href="#">cara penggunaan</a></div>
        </div>
    </div>
</div>

</div>

<!-- ANGULAR -->
<script type="text/javascript">
    //PERSONIL LIST
app.controller('ctrlPersonilList',['$scope','$window','$location','$http','$sce','$timeout',
    function($scope,$window,$location,$http,$sce,$timeout){
        var rootdir = $scope.rootdir = '[[url()]]';
        var idusaha = [[$usaha->idUsaha]];
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
            $scope.searchloader=true;
            $('#addModal').modal('show');
        }
        //PERSONIL LIST
        $scope.listPersonil = function(status)
        {
            $scope.errordiv = true;$scope.loader = false;
            if(!status){status = '';}
            var url = rootdir+'/ajax/personil/list?type=json&status='+status;
            var ajax = $http.post(url,{idusaha:idusaha});
            ajax.success(function(json){
                if(json.length > 0){$scope.loader=true;}else{$scope.loader=true;$scope.errordiv=false;$scope.errormessage="tidak punya personil";}
                $scope.total = 'Total : '+json.length;
                $scope.personils=json;
            });
            ajax.error(function(){$scope.loader=true;alert('terjadi masalah');});
        }
        //SHOW PERSONIL ACTIVITIES
        $scope.activitiesPersonil = function(idpersonil,nama)
        {
            var host = $location.host();
            var port = $location.port();
            var url = rootdir+'/ajax/personil/activities';
            var req = $http.post(url,{idpersonil:idpersonil});
            req.success(function(response){
                console.log(response);
                //modal show
                $scope.modalTitle = 'Aktifitas '+nama;
                $scope.modalContent = 'maksimal 100 aktifitas';
                $scope.activities = response;
                $('#myModal').modal('show');
                $scope.modalBody = '';
                $scope.modalFooter ='<a data-toggle="tooltip" title="simpan" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-save"></span></a>';
                });
            req.error(function(){alert('terjadi masalah');});
        }
        //SEARCH PERSONIL
        $scope.searchPersonil = function()
        {
            $timeout(function()
            {
                $scope.searchkey = $scope.keyword;
                var keyword = $scope.keyword;
                $scope.keyword = keyword;
                if(!keyword){$scope.searchloader = true;}
                else{
                    //start do search
                    var url = rootdir+'/ajax/personil/search?q='+keyword;
                    var ajax = $http.get(url);
                    ajax.success(function(response){
                        if(response.length != 0){$scope.searchloader=true;}
                        else{$scope.searchloader=true;$scope.searchkey="username tidak ditemukan";}                        
                        //results list
                        $scope.searchresults = response;
                    });
                    ajax.error(function(){$scope.searchloader=true;alert('terjadi masalah');});
                }
            },1500);
        }
        //DELETE PERSONIL
        $scope.deletePersonil = function(idpersonil)
        {
            var agree = confirm('Anda yakin!');
            if(agree == true)
            {
                alert(idpersonil);
            }
        }
        //AUTO LOAD
        $scope.listPersonil('');
    }]);
</script>
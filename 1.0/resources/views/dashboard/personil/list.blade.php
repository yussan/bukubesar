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
                    <td ng-click="activitiesPersonil(p.idPersonil,p.namaUser)" style="width:40px"><a id="link-avatar" class="avatar" data-toggle="dropdown" href="#"><img ng-src="{{rootdir+'/images/avatar/'+p.avatar}}" alt="..." class="img-circle"></a></td>
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
                    <td style="width:40px"><a id="link-avatar" class="avatar" data-toggle="dropdown" href="#"><img ng-src="{{rootdir+'/images/avatar/'+s.avatar}}" alt="..." class="img-circle"></a></td>
                    <td {{s.username}}<br/>{{s.username}}</td>
                    <td style="width:50px">
                        <button ng-click="showBagian(s.idUser)" style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="tambah sebagai personil" class="btn-small btn btn-circle btn-primary" href="#"><span  class="glyphicon glyphicon-plus"></span></button> 
                        <br/>
                    </td>
                </tr>
                </table>
            </div>
            <div class="modal-footer"><a target="_blank" style="color:gray" href="#">cara penggunaan</a></div>
        </div>
    </div>
</div>

<!-- PERSONIL BAGIAN APA -->
<div class="modal fade" id="bagianModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="color:gray" class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pilih Bagian</h4>
            </div>
            <div style="max-height:350px;overflow-y: scroll;" class="modal-body">
                <p>pilih bagian untuk</p>
                <div compile="htmlbagian"></div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- ANGULAR -->
<script type="text/javascript">
    var idusaha = [[$usaha->idUsaha]];
</script>
<script type="text/javascript" src="[[url('js/bukubesar-personil-controller-1.js')]]"></script>
<style type="text/css">
    input{margin-bottom:10px;}
    small{color:rgb(179, 179, 179);}
</style>
<div ng-controller="ctrlPersediaanBarang" class="box">
    <!--LEFT-->
    <div ng-style="sidebarLeft" class="box-persediaan-left col-md-2">
        <h2>BukuBesar</h2>
        <br/>
        @include('dashboard.persediaan.navbar')
    </div>
    <div class="col-md-2"><p></p></div>
    <!-- END OF LEFT -->
    <div style="padding-right:0" class="col-md-10">
        <!--HEADER-->
        <div class="box-kasir-right col-md-12">
            <ol class="breadcrumb">
              <li><a style="color:gray" href="#">Dashboard</a></li>
              <li><a style="color:gray" href="#">persediaan</a></li>
              <li class="active">Barang</li>
          </ol>
          <!-- INPUT KASIR -->
          <div  class="box-kasir-right row">
            <div class="box-form">
                <div class="col-xs-9"><h1>persediaan : Barang
                    <button ng-click="showAdd()" type="button" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-plus"></span></button>
                    <button ng-click="showSearch()" type="button" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-search"></span></button>
                </h1> 
            </div>
            <div class="box-kasir-veryright col-xs-3">

            </div>
            <form ng-submit="searchItems()" class="col-xs-12" ng-hide="search" role="form">
                <div style="padding-left:0" class="col-xs-10">
                    <input ng-model="TxtKeyword" type="text" class="form-control" id="exampleInputEmail2" placeholder="Kode / Nama Barang" requried autofocus>
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-search"></span></button></div>
                </form>
            </div>
        </div>               
        <!-- LIST BARANG -->
        <br/>
        <div class="row">
            <div ng-style="styleItemList" class="parent-list">
                <div class="">
                    <div class="col-sm-1">
                        <li><strong>Tags</strong> 
                            <button ng-click="showEditTags()" style="padding:1px 5px;color:gray" class="btn btn-circle btn-default btn-xs" href="#"><span class="glyphicon glyphicon-pencil"></span></button></li>
                        </div>
                        <div class="col-sm-11">
                            <!-- edit tags -->
                            <form ng-submit="actUpdateTags()" class="col-xs-12" ng-hide="editTags" role="form">
                                <div style="padding-left:0" class="col-xs-10">
                                    <small>pisahkan dengan tanda koma (,)</small>
                                    <input ng-model="persediaanTags" type="text" class="form-control" id="exampleInputEmail2" placeholder="isi tags dan pisahkan dengna koma" required autofocus>
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-floppy-disk"></span></button></div>
                                </form>
                            </div>
                        </div>
                        <br/>

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a ng-click="getItems()" href="#items" aria-controls="home" role="tab" data-toggle="tab">Semua</a></li>
                            <li ng-repeat="tag in tags" role="presentation"><a ng-click="getItems(tag)" href="#tag-{{tag}}" aria-controls="profile" role="tab" data-toggle="tab">{{tag}}</a></li>
                        </ul>
                        <br/>
                        <div ng-hide="BoxAlertItem" class="alert alert-warning">{{TextAlertItem}}</div>
                        <table class="table box-list">
                         <tr ng-repeat="list in lists">
                            <td><strong>{{list.merek}}</strong><br/>{{list.kodeBarang}}</td>
                            <td><strong>Tag</strong><br/>{{list.tagItem}}</td>
                            <td><strong>Harga Produksi</strong><br/>{{list.hargaProduksi | currency:"Rp"}}</td>
                            <td><strong>Harga Jual</strong><br/>{{ Math.round(list.hargaProduksi + 1) | currency:"Rp"}}</td>
                            <td><strong>Untung</strong><br/>{{list.untung}}%</td>
                            <td><strong>Diskon</strong><br/>{{list.diskon}}%</td>
                            <td><strong>Stok</strong><br/>{{list.stok}}</td>
                            <td><strong>Rak</strong><br/>{{list.rak}}</td>
                            <td style="width:50px">
                                <a ng-click="actDeleteItem(list.idItem)" style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                <a ng-click="showUpdateItem()" style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                <br/>
                            </td>
                        </tr>  
                    </table>
                </div>
            </div>
        </div>           
        <!--HEADER-->
        <!-- MODAL ADD ITEM -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div style="color:gray" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
            </div>
            <div class="modal-body">
                <form ng-submit="actAddItem()">
                    <label for="txtBarang">Nama Barang</label>
                    <input class="form-control" id="txtBarang" type="text" placeholder="masukaNamaBarang">
                    <label for="txtKode">Nomor Seri</label>
                    <input class="form-control" id="txtKode" type="text" placeholder="barcode atau nomor ptoduksi atau kosong">
                    <label for="txtStok">Stok</label>
                    <input class="form-control" id="txtStok" type="number" min="0" placeholder="barcode atau nomor ptoduksi atau kosong">
                    <label for="txtKode">Untung (%) <small>masukan angka 0-100 tanpa tanda '%'</small></label>
                    <input class="form-control" id="txtUntung" type="number" min="0" max="100" placeholder="presentasi keuntungan yang diambil">
                    <label for="txtKode">Diskon (%) <small>masukan angka 0-100 tanpa tanda '%'</small></label>
                    <input class="form-control" id="txtDiskon" type="text" min="0" max="100" placeholder="diskon untuk penjualan">
                </form>
            </div>
            <div class="modal-footer">
               <button ng-click="add()" type="button" class="btn btn-default btn-circle" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
               <button ng-click="add()" type="button" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-floppy-disk"></span></button>
           </div>
       </div>
   </div>
</div>
<!-- END OF MODAL ADD ITEM -->
<!-- MODAL UPDATE ITEM -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div style="color:gray" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
            </div>
            <div class="modal-body">
                <form ng-submit="actUpdateItem()">
                    <label for="txtBarang">Nama Barang</label>
                    <input class="form-control" id="txtUpdateBarang" type="text" placeholder="masukaNamaBarang">
                    <label for="txtKode">Nomor Seri</label>
                    <input class="form-control" id="txtUpdateKode" type="text" placeholder="barcode atau nomor ptoduksi atau kosong">
                    <label for="txtStok">Stok</label>
                    <input class="form-control" id="txtUpdateStok" type="number" min="0" placeholder="barcode atau nomor ptoduksi atau kosong">
                    <label for="txtKode">Untung (%) <small>masukan angka 0-100 tanpa tanda '%'</small></label>
                    <input class="form-control" id="txtUpdateUntung" type="number" min="0" max="100" placeholder="presentasi keuntungan yang diambil">
                    <label for="txtKode">Diskon (%) <small>masukan angka 0-100 tanpa tanda '%'</small></label>
                    <input class="form-control" id="txtUpdateDiskon" type="text" min="0" max="100" placeholder="diskon untuk penjualan">
                </form>
            </div>
            <div class="modal-footer">
               <button ng-click="add()" type="button" class="btn btn-default btn-circle" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
               <button ng-click="add()" type="button" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-floppy-disk"></span></button>
           </div>
       </div>
   </div>
</div>
<!-- END OF MODAL UPDATE ITEM -->
</div>

<!-- ANGULAR -->
<script type="text/javascript">
    var idusaha = [[$usaha->idUsaha]];
    var tags = [[$tags]];
    // var tagsraw = [[$tags]];
</script>
<script type="text/javascript" src="[[url('js/bukubesar-persediaan-controller-1.js')]]"></script>
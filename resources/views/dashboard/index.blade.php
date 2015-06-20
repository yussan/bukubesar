
 <div ng-controller="ctrlPersediaanBarang" class="box">
        <!--LEFT-->
        <div ng-style="sidebarLeft" class="box-persediaan-left col-md-2">
            <h2>BukuBesar</h2>
            <br/>
            <a href="<?php echo url('dashboard');?>"><span class="glyphicon glyphicon-chevron-left"></span> Ke Dashboard</a>
            <br/><br/>
            @include('dashboard/sidebar')
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
                    <form class="col-xs-12" ng-hide="search" role="form">
                        <div style="padding-left:0" class="col-xs-10">
                            <input ng-keyup="search()" ng-model="txtItem" type="text" class="form-control" id="exampleInputEmail2" placeholder="Kode / Nama Barang" requried autofocus>
                        </div>
                        <div class="col-xs-2">
                            <button ng-click="add()" type="button" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-search"></span></button></div>
                        </form>
                    </div>
                </div>               
                <!-- LIST BARANG -->
                <br/>
                <div class="row">
                    <div ng-style="styleItemList" class="parent-list">
                        <table class="table box-list">
                             <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>       
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                            <tr>
                                <td><strong>Milo 200 Miligram</strong><br/>672163-232873</td>
                                <td><strong>Kategori</strong><br/>Makanan dan Minuman</td>
                                <td><strong>Harga Beli</strong><br/>Rp45.000,-</td>
                                <td><strong>Harga Jual</strong><br/>Rp45.000,-</td>
                                <td><strong>Untung</strong><br/>10%</td>
                                <td><strong>Diskon</strong><br/>5%-</td>
                                <td><strong>Stok</strong><br/>345</td>
                                <td><strong>Rak</strong><br/>C-45</td>
                                <td style="width:50px">
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-danger" href="#"><span  class="glyphicon glyphicon-remove"></span></a> 
                                    <a style="padding:1px 5px" data-toggle="tooltip" data-placement="bottom" title="reset data transaksi" class="btn btn-circle btn-xs btn-default" href="#"><span style="color:gray" class="glyphicon glyphicon-pencil"></span></a> 
                                    <br/>
                                </td>
                            </tr>    
                        </table>
                    </div>
                </div>
            </div>           
            <!--HEADER-->
           <!-- MODAL -->
           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div style="color:gray" class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{modalTitle}}</h4>
                  </div>
                  <div class="modal-body">
                    {{modalContent}}
                  </div>
                  <div class="modal-footer">
                   <button ng-click="add()" type="button" class="btn btn-default btn-circle" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                   <button ng-click="add()" type="button" class="btn btn-default box-persediaan-btn"><span class="glyphicon glyphicon-floppy-disk"></span></button>
                  </div>
                </div>
              </div>
            </div>
        </div>
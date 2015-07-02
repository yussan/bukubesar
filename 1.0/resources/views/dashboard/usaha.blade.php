 <?php $totstok =$totStok[0]->totalstok;if(empty($totstok))$totstok=0;  ?>
 <!-- moris -->
 <link rel="stylesheet" type="text/css" href="[[url('css/morris.css')]]"> 
 <!-- moriss -->
 <script src="[[url()]]/js/morris.min.js"></script>
 <script src="[[url()]]/js/raphael-min.js"></script>
 <div ng-controller="ctrlUsaha" class="box">
  <!--LEFT-->
  <div ng-style="sidebarLeft" class="box-all-left col-md-2">
    <h4>BukuBesar</h4>
    <br/>
    @include('dashboard/usahasidebar')
  </div>
  <div class="col-md-2"><p></p></div>
  <!-- END OF LEFT -->
  <div style="padding-right:0" class="col-md-10">
    <!--HEADER-->
    <div class="box-kasir-right col-md-12">
      <ol class="breadcrumb">
        <li><a style="color:gray" href="[[url('dashboard')]]">Dashboard</a></li>
        <li>usaha</li>
        <li class="active">[[$usaha->namaUsaha]]</li>
      </ol>
      <!-- INPUT KASIR -->
      <div class="unbox box-kasir-right row">
        <div class="box-form">
          <div class="col-xs-9"><h1>Usaha 
            <a data-toggle="collapse" href="#identitas" aria-expanded="false" aria-controls="identitas"><small style="font-size:10px">lihat detail usaha <span class="glyphicon glyphicon-menu-down"></span></small></a></h1></div>
            <div class="box-kasir-veryright col-xs-3"></div>               
            <div class="col-md-12">
             <!-- collapse -->
             <div class="collapse" id="identitas">
              <div class="well">
                <address>
                  <strong>[[$usaha->namaUsaha]]</strong><br>
                  [[$usaha->alamatUsaha]]<br>
                  <abbr title="Kecamatan">Kec.</abbr>[[$usaha->kecamatan]],<abbr title="Kabupaten atau Kota">Kab/Kota.</abbr>[[$usaha->kota]],<abbr title="Provinsi">Prov.</abbr> [[$usaha->provinsi]]<br>
                  <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
              </div>
            </div>
            <!-- end of collapse -->
            <hr/>
          </div>
          <!-- STATS USAHA BARANG -->
          <br/>               
          <!-- the content -->

          <!-- bagian saya -->
          <div class="col-md-12"><h2><span class="glyphicon glyphicon-stats"></span> Aktifitas</h2></div>
          <div class="col-md-12 row">
            <div class="col-md-3">
              <h4>Personil [[count($personil)]]</h4>
              @if(empty($personil))
              <div class="alert alert-warning col-xs-12">Belum mempunyai personil</div>
              @else
              <table class="table">
                @foreach($personil as $p)
                @if(empty($p->avatar)) 
                <?php $p->avatar = url('images/avatar/avatar.png');?>
                @else
                <?php $p->avatar = url('images/avatar/'.$p->avatar);?>
                @endif
                <tr><a href="#">
                  <td style="width:50px" class="avatar"><img class="img-circle" src="[[$p->avatar]]"></td><td>
                  [[$p->username]]<br/><small>bag. [[$p->statusPersonil]]</small></a></td>
                </tr>
                @endforeach
              </table>
              @endif
            </div>
            <div class="col-md-3">
              <h4>Aktifitas Penjualan</h4>
              <div class="alert alert-warning col-xs-12">
                Belum mempunyai personil
              </div>
            </div>
            <div class="col-md-3">
              <h4>Aktifitas Persediaan</h4>
              <div class="alert alert-warning col-xs-12">
                Belum mempunyai personil
              </div>
            </div>
            <div class="col-md-3">
              <h4>Aktifitas Akuntansi</h4>
              <div class="alert alert-warning col-xs-12">
                Belum mempunyai personil
              </div>
            </div>
          </div>
          <!-- PENJUALAN -->
          <!-- grafik pertahun -->
          <div class="col-md-12"><h2><span class="glyphicon glyphicon-list"></span> Persediaan</h2></div>
          <div class="col-md-12">
            <!-- the content -->
            <h4>Penjualan Pertahun 
              <select class="box-select">
                <option>Semua Bulan</option>
              </select>
              <select class="box-select">
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
              </select>
              <small>loading...</small>
            </h4>
            <p>max 5 tahun, untuk unlimited data silahkan upgrade ke <a href="#">premium</a></p>
            <div class="alert alert-warning col-md-12">
              Belum mempunyai personil
            </div>
            <div style="height:300px" class="col-md-12" id="bar-penjualan"></div>
            <br/>
            <!-- smart number -->
            <div class="col-sm-4">
              <!-- the content -->
              <div style="text-align:center;font-size:20px">
                <p>Total Harga Produksi Sekarang<br/>
                  <strong>Rp[[number_format($totHP[0]->totalhp * $totStok[0]->totalstok).',-']]</strong>
                </p>
              </div>
              <!-- the content -->
            </div>
            <div class="col-sm-4">
              <!-- the content -->
              <div style="text-align:center;font-size:20px">
                <p>Total Penjualan Sekarang<br/>
                  <?php $tothpen = $totHPen[0]->totalhp;if(empty($tothpen))$tothpen=0; ?>
                  <strong>[['Rp'.number_format($tothpen * $totstok).',-']]</strong>
                </p>
              </div>
              <!-- the content -->
            </div>
            <!-- end of smart number -->
            <!-- the content -->
          </div>

          <!-- PERSEDIAAN -->
          <!-- grafik pertahun -->
          <div class="col-md-12"><h2><span class="glyphicon glyphicon-shopping-cart"></span> Penjualan</h2></div>
          <div class="col-md-12">
            <!-- the content -->
            <h4>Stok 
              <select class="box-select">
                <option>Semua Bulan</option>
              </select>
              <select class="box-select">
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
              </select>
              <small>loading...</small>
            </h4>
            <p>max 5 tahun, untuk unlimited data silahkan upgrade ke <a href="#">premium</a></p>
            <div class="alert alert-warning col-md-12">
              Belum mempunyai personil
            </div>
            <div style="height:300px" class="col-md-12" id="bar-stok">

            </div>
            <!-- the content -->
          </div>
          <br/>
          <!-- smart number -->
          <div class="col-sm-4">
            <!-- the content -->
            <div style="text-align:center;font-size:20px">
              <p>Total Merek Sekarang<br/>
                <strong>[[$totMerek]]</strong>
              </p>
            </div>
            <!-- the content -->
          </div>
          <div class="col-sm-4">
            <!-- the content -->
            <div style="text-align:center;font-size:20px">
              <p>Total Stok Sekarang<br/>
                <strong>[[$totstok]]</strong>
              </p>
            </div>
            <!-- the content -->
          </div>
          <!-- end of smart number -->
          <!-- end row -->
        </div>
      </div>
    </div>
  </div>

  <!-- secure page modal -->
  <div class="modal fade" id="securePageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Masukan Password Untuk Melanjutkan</h4>
        </div>
        <div class="modal-body">
          <form ng-submit="checkSecurePage()">
            <input ng-model="password" type="password" class="form-control input-lg" placeholder="masukan password anda" required>
          </form>
          <div ng-hide="loader" style="margin-top:10px" class="alert alert-warning">pengecekan...</div>
        </div>        
      </div>
    </div>
  </div>
  <!-- STATS PENJUALAN -->
  <script type="text/javascript">
    Morris.Bar({
      element: 'bar-penjualan',
      data: [
      { y: 'Jan', a: 100, b: 90 },
      { y: 'Feb', a: 75,  b: 65 },
      { y: 'Mar', a: 50,  b: 40 },
      { y: 'Apr', a: 75,  b: 65 },
      { y: 'Mei', a: 50,  b: 40 },
      { y: 'Jun', a: 75,  b: 65 },
      { y: 'Jul', a: 100, b: 90 },
      { y: 'Agu', a: 100, b: 90 },
      { y: 'Sep', a: 100, b: 90 },
      { y: 'Okt', a: 100, b: 90 },
      { y: 'Nov', a: 100, b: 90 },
      { y: 'Des', a: 100, b: 90 }
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Item', 'Pendapatan']
    });
  </script>
  <!-- STATS STOK -->
  <script type="text/javascript">
    Morris.Bar({
      element: 'bar-stok',
      data: [
      { y: 'Jan', a: 100, b: 90 },
      { y: 'Feb', a: 75,  b: 65 },
      { y: 'Mar', a: 50,  b: 40 },
      { y: 'Apr', a: 75,  b: 65 },
      { y: 'Mei', a: 50,  b: 40 },
      { y: 'Jun', a: 75,  b: 65 },
      { y: 'Jul', a: 100, b: 90 },
      { y: 'Agu', a: 100, b: 90 },
      { y: 'Sep', a: 100, b: 90 },
      { y: 'Okt', a: 100, b: 90 },
      { y: 'Nov', a: 100, b: 90 },
      { y: 'Des', a: 100, b: 90 }
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Item', 'Pendapatan']
    });
  </script>
  <script type="text/javascript">
    var idusaha = [[$usaha->idUsaha]];
  </script>
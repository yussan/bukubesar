<div ng-controller="ctrlUsaha" class="box">
  <!--LEFT-->
  <div ng-style="sidebarLeft" class="box-all-left col-md-2">
    <h2>BukuBesar</h2>
    <br/>
    @include('dashboard/sidebar')
  </div>
  <div class="col-md-2"><p></p></div>
  <!-- END OF LEFT -->
  <div style="padding-right:0" class="col-md-10">
    <!--HEADER-->
    <div class="box-kasir-right col-md-12">
      <ol class="breadcrumb">
        <li><a style="color:gray" href="[[url('dashboard')]]">Dashboard</a></li>
        <li class="active">Index</li>
      </ol>
      <!-- INPUT KASIR -->
      <div  class="box-kasir-right row">
        <div class="box-form">
          <div class="col-xs-9"><h1>Dashboard</h1></div>
          <div class="box-kasir-veryright col-xs-3"></div>               
          <!-- STATS USAHA BARANG -->
          <br/>
          <!-- usaha saya -->
          <div class="col-xs-12">
            <hr/>
            <!-- the content -->
            <h2><a style="padding:1px 5px" class="btn btn-primary btn-circle" href="#"><span class="glyphicon glyphicon-plus"></span></a>
              Usaha <small>tambahkan usaha yang anda miliki dibagian ini untuk menggunakan fitur-fitur dari BukuBesar</small></h2> 

              @if(empty($usaha))
              <div class="alert alert-warning col-xs-12">Belum menambah usaha</div>
              @else
              <div class="unbox" class="row">
                @foreach($usaha as $u)
                <div class="col-md-4">
                  <?php 
                  $encid = str_replace('=','',base64_encode(base64_encode($u->idUsaha)));
                  ?>
                  <a href="[[url('dashboard/usaha/'.$encid)]]">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h4>[[$u->namaUsaha]]</h4>
                        <small>update : [[$u->tglUpdateUsaha]]</small>
                        <br/><br/>
                        <span style="vertical-align:center" data-toggle="tooltip" data-placement="top" title="Personil" class="glyphicon glyphicon-user"></span> 34
                        <span style="vertical-align:center" data-toggle="tooltip" data-placement="top" title="Pendapatan Bulan Ini" class="glyphicon glyphicon-stats"></span> Rp 35 Juta
                        <a href="[[url('dashboard/usaha/'.$encid)]]" class="pull-right btn-circle btn-default btn"><span class="glyphicon glyphicon-triangle-right"></span></a>
                      </div>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
              @endif
              <!-- the content -->
            </div>
            <!-- personil saya -->
            <div class="col-xs-12">
              <!-- the content -->
              <h2><a style="padding:1px 5px" class="btn btn-primary btn-circle" href="#"><span class="glyphicon glyphicon-plus"></span></a>
                Personil <small>adalah karyawan yang terbagi atas bagian masing-masing (penjualan, persediaan, akuntansi)</small></h2>

                <div class="alert alert-warning col-xs-12">
                  Tidak mempunyai personil
                </div>
                <div class="row">

                </div>
                <!-- the content -->
              </div>
            </div>           
            <!-- bagian saya -->
            <div class="col-xs-12">
              <!-- the content -->
              <h2>Bagian</h2>
              <div class="alert alert-warning col-xs-12">
                Belum mempunyai personil
              </div>
              <div class="row">

              </div>
              <!-- the content -->
            </div>
            <!--HEADER-->
          </div>
        </div>
      </div>
    </div>

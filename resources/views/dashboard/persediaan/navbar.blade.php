<?php $encidusaha = Request::segment(4);?>
<dl>
    <dd><a href="[[url('dashboard')]]"><span class="glyphicon glyphicon-home"></span> Dashboard</a></dd>
    <dd><a href="[[url('dashboard/usaha/'.$encidusaha)]]"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a></dd>
    <br/>
    <dd><strong>[[$usaha->namaUsaha]]</strong></dd>
   <dl>
        <dd><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Pasokan Baru</a></dd>
        <br/>
        <dd><a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span> Barang</a></dd>
        <dd><a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span> Kategori</a></dd>
        <dd><a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span> Riwayat Pasokan</a></dd>
    </dl>
</dl>
<?php
$encidusaha = Request::segment(3);
?>
<dl>
    <dd><a href="[[url('dashboard')]]"><span class="glyphicon glyphicon-chevron-left"></span> Dashboard</a></dd>
    <br/>
    <dd><strong>[[$usaha->namaUsaha]]</strong></dd>
    <dd><a href="[[url('dashboard/usaha/penjualan/'.$encidusaha)]]"><span class="glyphicon glyphicon-shopping-cart"></span> Penjualan</a></dd>
    <dd><a href="[[url('dashboard/usaha/persediaan/'.$encidusaha)]]"><span class="glyphicon glyphicon-list"></span> Persediaan</a></dd>
    <dd><a href="[[url('dashboard/usaha/akuntansi/'.$encidusaha)]]"><span class="glyphicon glyphicon-book"></span> Akuntansi</a></dd>
    <dd><a href="[[url('dashboard/usaha/personil/'.$encidusaha)]]"><span class="glyphicon glyphicon glyphicon-user"></span> Personil</a></dd>
    <br/>
    <dd><a href="#"><span class="glyphicon glyphicon-wrench"></span> Edit Usaha</a></dd>
</dl>
<?php $encidusaha = Request::segment(3);?>
<dl>
<dd><a href="[[url('dashboard')]]"><span class="glyphicon glyphicon-chevron-left"></span> Dashboard</a></dd>
<br/>
<dd><strong>[[$usaha->namaUsaha]]</strong></dd>
@if($status == "pemilik")
<dd><a ng-click="securePage('[[url('dashboard/usaha/penjualan/'.$encidusaha)]]')" href="#penjualan"><span class="glyphicon glyphicon-shopping-cart"></span> Penjualan</a></dd>
<dd><a ng-click="securePage('[[url('dashboard/usaha/persediaan/'.$encidusaha)]]')" href="#persediaan"><span class="glyphicon glyphicon-list"></span> Persediaan</a></dd>
<dd><a ng-click="securePage('[[url('dashboard/usaha/akuntansi/'.$encidusaha)]]')" href="#akuntansi"><span class="glyphicon glyphicon-book"></span> Akuntansi</a></dd>
<dd><a href="[[url('dashboard/usaha/personil/'.$encidusaha)]]"><span class="glyphicon glyphicon glyphicon-user"></span> Personil</a></dd>
<br/>
<dd><a href="#"><span class="glyphicon glyphicon-wrench"></span> Edit Usaha</a></dd>
@elseif($status == "penjualan")
<dd><a ng-click="securePage('penjualan')" href="#penjualan"><span class="glyphicon glyphicon-shopping-cart"></span> Penjualan</a></dd>
@elseif($status == "persediaan")
<dd><a ng-click="securePage('persediaan')" href="#persediaan"><span class="glyphicon glyphicon-list"></span> Persediaan</a></dd>
@elseif($status == "akuntansi")
<dd><a ng-click="securePage('akuntansi')" href="#akuntansi"><span class="glyphicon glyphicon-book"></span> Akuntansi</a></dd>
@endif
</dl>
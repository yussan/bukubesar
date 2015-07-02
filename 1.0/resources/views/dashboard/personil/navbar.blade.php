<?php $encidusaha = Request::segment(4);?>
<dl>
    <dd><a href="[[url('dashboard')]]"><span class="glyphicon glyphicon-home"></span> Dashboard</a></dd>
    <dd><a href="[[url('dashboard/usaha/'.$encidusaha)]]"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a></dd>
    <br/>
    <dd><strong>[[$usaha->namaUsaha]]</strong></dd>
    <dl>
        <dd><a ng-click="showAdd()" href="#"><span class="glyphicon glyphicon-plus-sign"></span> Personil Baru</a></dd>
        <br/>
        <dd><a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span> Semua Personil</a></dd>
        <dd><a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span> Aktifitas Personil</a></dd>
    </dl>
</dl>
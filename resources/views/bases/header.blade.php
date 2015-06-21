<!doctype HTML>
<html>
<head>
    <title>[[$title]] - Buku Besar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="[[url('css/bootstrap.min.css')]]" media="screen">
    <link rel="stylesheet" type="text/css" href="[[url('css/bukubesar-1.css')]]" media="screen"> 
    <style type="text/css">td{vertical-align: center}</style>
    <!-- script -->
    <script src="[[url()]]/js/jquery.min.js"></script>
    <script src="[[url()]]/js/angular.min.js"></script>
    <script src="[[url()]]/js/angular-route.min.js"></script>
    <script src="[[url()]]/js/bootstrap.min.js"></script>
    <script src="[[url()]]/js/bukubesar-controller-1.js"></script>
    <script src="[[url()]]/js/bukubesar-directive-1.js"></script>
    <script type="text/javascript">
        $('[data-toggle="tooltip"]').tooltip();
    </script>
</head>
<body ng-app="appBukuBesar" style="display:block">
    <div ng-controller="ctrlHome" scroll class="home">
       
      <nav ng-style="fixHeader" class="header col-xs-12">
        <div class="col-xs-2"><a href="[[url('/')]]"><div class="logo"><h3>BukuBesar<span>.me</span><sup style="top:-2em;font-size:10px">beta</sup></h3></div></a></div>
        <div class="col-xs-4">
            <ul class="home-nav nav nav-pills">
              <li role="presentation"><a href="#">Bantuan</a></li>
              <li role="presentation"><a href="#">Kontak Kami</a></li>
            </ul>
        </div>
        <div class="col-xs-6">
            @if (Session::has('userlogin'))[[[-- users logged in --]]]
            <?php
            $sess = Session::get('userlogin');
            $username = $sess[0]->username;
            ?>
            <div style="padding:10px" class="pull-right dropdown">
                <a id="link-avatar" class="avatar" data-toggle="dropdown" href="#"><img src="[[url('images/avatar.jpg')]]" alt="..." class="img-circle"> [[$username]] <span class="glyphicon glyphicon-menu-down"></span></a>
                <ul id="dropdown-avatar" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="[[url('dashboard')]]">Dashboard</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="[[url('dashboard/edit')]]">Edit Profile</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="[[url('logout')]]">Logout</a></li>
                </ul>
            </div>
            @else
            <ul class="pull-right home-nav nav nav-pills">
              <li role="presentation"><a data-toggle="modal" data-target="#getstarted" href="#getstarted"><strong>Mulai menggunakan</strong>.Register/login</a></li>
            </ul>
            @endif
        </div>
    </nav>
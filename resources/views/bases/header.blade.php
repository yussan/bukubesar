<!doctype HTML>
<html>
<head>
    <title>[[$title]] - Buku Besar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/bukubesar-1.css" media="screen"> 
    <style type="text/css">td{vertical-align: center}</style>
</head>
<body ng-app="appBukuBesar" style="display:block">
    <div ng-controller="ctrlHome" scroll class="home">
       
      <nav ng-style="fixHeader" class="header col-xs-12">
        <div class="col-xs-2"><a href="#"><div class="logo"><h3>BukuBesar<span>.com</span><sup style="top:-2em;font-size:10px">beta</sup></h3></div></a></div>
        <div class="col-xs-4">
            <ul class="home-nav nav nav-pills">
              <li role="presentation"><a href="#">Bantuan</a></li>
              <li role="presentation"><a href="#">Kontak Kami</a></li>
            </ul>
        </div>
        <div class="col-xs-6">
            <div style="padding:10px" class="pull-right dropdown">
                <a id="link-avatar" class="avatar" data-toggle="dropdown" href="#"><img src="images/avatar.jpg" alt="..." class="img-circle"> username <span class="glyphicon glyphicon-menu-down"></span></a>
                <ul id="dropdown-avatar" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Edit Profile</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
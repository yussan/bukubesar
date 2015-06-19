    <!-- FOOTER -->
    <div class="home-footer col-md-12">
    	<center>BukuBesar &copy; 2015 by Id More Team</center>
    </div>
</div>
<!-- login modal -->
<div ng-controller="ctrlGetStarted" class="modal fade" id="getstarted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Login / Register</h4>
			</div>
			<div class="modal-body">
				<form name="getstarted" method="POST">
					<center>
						<input class="form-control" type="text" placeholder="username" required>
						<br/>
						<input class="form-control" type="password" placeholder="password" required>
						<br/>
						<button data-toggle="tooltip" data-placement="bottom" title="register" class="btn btn-lg btn-default btn-circle"><span class="glyphicon glyphicon-plus"></span></button>
						<button data-toggle="tooltip" data-placement="bottom" title="Login" class="btn btn-lg btn-primary btn-circle"><span class="glyphicon glyphicon-log-in"></span></button>
						<img style="width:40px" src="images/system/loader.gif">
					</center>
				</form>
			</div>

		</div>
	</div>
</div>
<!-- end of login modal -->
<script src="js/jquery.min.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bukubesar-controller-1.js"></script>
<script src="js/bukubesar-directive-1.js"></script>
</body>
</html>
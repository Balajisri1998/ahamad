<!DOCTYPE html>
<html>
<head>
	<title>main</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="css/custom-style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
	<link rel="stylesheet" type="text/css" href="css/forecast.css">
	<script type="text/javascript" src="js/forecast.js"></script>
</head>
<body ng-app ='app'>
	<div class="container-fluid custom-fluid">
		<div>
			<nav class="navbar navbar-fixed-top custom-navbar">
			  <div class="container-fluid">
			    <div class="navbar-header block">
			    	<button type="button " class="navbar-toggle custom-toggle"  data-toggle="collapse" data-target="#mynav">
					    <img src="img/favicon.ico">
					 </button>
			      	<a class="navbar-brand custom-navbar-brand" href="http://infinitisoftware.net/"><img src="img/logo-inverse.jpg" height="60px" width="200px"></a>
			    </div> 
			    <div class=" block float-right">
			    	<div id="mynav" class="collapse navbar-collapse custom-collapse" >
				      <ul class="nav navbar-nav navbar-right">
				      	<li class="margin-top-25 ">Hi <?php echo $_SESSION['name']?></li>
				        <li class="font-20 margin-top-20"><a href="signin.php" class="logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
				      </ul>
				    </div>
			  	</div>
			    <div class="float-clear"></div>
			  </div>
			</nav>
		</div>
	</div>
	<div class="container-fluid margin-top-100">
		<div class="row">
			<div class="col-md-12 center-block">
				<ul class="ul text-center">

					<?php
						$query = "select menu_name from core_menu_details cmd inner join core_menu_mapping_details cmmd on cmmd.r_menu_id =cmd.menu_id inner join dm_user_type dut on cmmd.r_user_type_id = dut.user_type_id inner join dm_account da on da.r_user_type_id = cmmd.r_user_type_id where da.r_user_type_id =".$_SESSION['type']." and da.r_employee_id = ".$_SESSION['emp_id'];
						$data = $conn->query($query);
						if($data->num_rows > 0)
						{
							while ( $datas = $data->fetch_assoc() ) {
								echo "<a class=\"a\" href=\"#!".$datas["menu_name"]."\"> <li class=\"li\" >".$datas["menu_name"]."</li></a>";
							}
						}

					?>

				</ul>
			</div>			
		</div>

		<div class="container-fluid" id="content" >
			
		</div><br><br><br><br>
		<div class="container-fluid" id="content" ng-view>
			
		</div><br><br><br><br>


		<!-- <div id="myDiv" class="forecast border text-center margin-bottom-30">
			<div class="form-group font-25">Forecast - Credit limit</div>
			<div class="row custom-row">
				<div class="col-md-3 padding-top-100">
					<form>
					    <div class="form-group">
					      <label for="sel1">Select Company</label>
					      <select class="form-control" id="sel1">
					        <option>SELECT</option>
					        <option>KLI</option>
					        <option>LODHA</option>
					        <option>L & T</option>
					        <option>KMBL</option>
					      </select>
					    </div>
					</form>
				</div>
				<div class="col-md-3 padding-top-100">
					<label >Report period</label><br>
					<select class="form-control period" >
						<option value="WEEK">WEEK</option>
						<option value="MONTH">MONTH</option>
					</select>
				</div>
				<div class="col-md-3 padding-top-100">
					<form>
					    <div class="form-group">
					      <label >Forecast view</label>
					      <select class="form-control">
							<option>Chart</option>
							<option>Value</option>
						</select>
					    </div>
					</form>
				</div>
				<div class="col-md-3 padding-top-100">
					<form>
					    <div class="form-group">
					    	<label>Forecart Month</label>
					    	<select class="form-control" >
						        <option>JAN</option>
						        <option>FEB</option>
						        <option>MAR</option>
						        <option>APR</option>
						        <option>MAY</option>
						        <option>JUN</option>
						        <option>JUL</option>
						        <option>AUG</option>
						        <option>SEP</option>
						        <option>OCT</option>
						        <option>NOV</option>
						        <option>DEC</option>
					      	</select><br>
					      	<select class='form-control' id="change">
					      		<option>Week - 1</option>
					      		<option>Week - 2</option>
					      		<option>Week - 3</option>
					      		<option>Week - 4</option>
					      		<option>Week - 5</option>
					      	</select>
					      	
					    </div>
					</form>
				</div>
				<div class="col-md-2 padding-top-100">
					
				</div>
			</div>
			<div class="row">
				<form class="form-group ">
					<input type="button" class="custom-button btn btn-sm btn-default stat-btn" name="" value="SUBMIT">
				</form>
			</div>
		</div> -->
		

	</div>


	<!-- script >
		$(document).ready(function(){
		  $("li").mouseenter(function(){
		    
		    $("li").child("click");

		  });
		});
	</script> -->
	 
</body>
</html>
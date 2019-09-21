<?php
	echo $_SESSION['name'];
	echo $_SESSION['type'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

	
</head>
<body>
	<div class="container-fluid">
		<div>
			<nav class="navbar hoverwhite textyellow navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
				      <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#mynav">
						  <img src="img/favicon.ico">
					  </button>
					  <a href="http://infinitisoftware.net/" class="navbar-brand"><b>INFINITI</b></a>
					</div>
					<div id="mynav" class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-center margin-left-400">
			               <li class="forecast1"><a href="javascript:;" >FORECAST</a></li>
			               <li class="data1"><a href="javascript:;">DATA</a></li>
			               <li class="api1"><a href="javascript:;">API</a></li>
			            </ul>
			            <ul class="nav navbar-nav navbar-right">
			               <li><a href="http://infinitisoftware.net">Home</a></li>
			               <li><a href="http://infinitisoftware.net/contactus.php">Contact</a></li>
			               <li><a href="http://infinitisoftware.net/aboutus.php">About</a></li>
			            </ul>
			            
					</div>
				</div>
			</nav>
		</div>
		<div id="myDiv" class="forecast border text-center margin-bottom-30">
			<div class="form-group font-20">Forecast - Credit limit</div>
			<div class="row custom-row">
				<div class="col-md-4 padding-top-100">
					<form>
					    <div class="form-group">
					      <label for="sel1">Select Company</label>
					      <select class="form-control" id="sel1">
					        <option>AAAA</option>
					        <option>BBBB</option>
					        <option>CCCC</option>
					        <option>DDDD</option>
					      </select>
					    </div>
					</form>
				</div>
				<div class="col-md-2 padding-top-100">
					<label >Type</label>
					<input type="text" class="form-control"><br>
					<input type="text" class="form-control">
				</div>
				<div class="col-md-2 padding-top-100">
					<form>
					    <div class="form-group">
					      <label >via or view</label>
					      <input type="text" class="form-control"><br>
						  <input type="text" class="form-control">
					    </div>
					</form>
				</div>
				<div class="col-md-2 padding-top-100">
					<form>
					    <div class="form-group">
					    	<label>Month</label>
					    	<select class="form-control">
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
					      	<select class="form-control">
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
					      	</select>
					    </div>
					</form>
				</div>
				<div class="col-md-2 padding-top-100">
					<form>
					    <div class="form-group">
					      <label >Year</label>
					      <input type="text" class="form-control"><br>
						  <input type="text" class="form-control">
					    </div>
					</form>
				</div>
			</div>
			<div class="row">
				<form class="form-group ">
					<input type="button" class="custom-button btn btn-sm btn-default stat-btn" name="" value="GO">
				</form>
			</div>
		</div>
		<div id="myDiv" class="data border text-center margin-bottom-30 hidden datashow">
			<div class="form-group font-20">DATA - Credit limit</div>
			<div class="row custom-row">
				<div class="col-md-6 padding-top-120">
					<form>
					    <div class="form-group">
					     <input class="pick" type="file" name="">
					    </div>
					</form>
				</div>
				<div class="col-md-6 padding-top-100">
					<form>
					    <div class="form-group">
					      <label>Select Company</label>
					      <select class="form-control">
					        <option>AAAA</option>
					        <option>BBBB</option>
					        <option>CCCC</option>
					        <option>DDDD</option>
					      </select>
					    </div>
					</form>
				</div>			
			</div><br><br>
			<div class="row">
				<form class="form-group ">
					<input type="button" class="custom-button btn btn-sm btn-default stat-btn" name="" value="UPLOAD">
				</form>
			</div>
		</div>

		<div class="api border text-center margin-bottom-30 hidden">
			<div class="form-group font-20">API - Credit limit</div>
			<div class="row custom-row">
				
				<div class="col-md-6 padding-top-100">
					<form>
					    <div class="form-group">
					      <label>Select Company</label>
					      <select class="form-control">
					        <option>AAAA</option>
					        <option>BBBB</option>
					        <option>CCCC</option>
					        <option>DDDD</option>
					      </select>
					    </div>
					</form>
				</div>		
				<div class="col-md-6 padding-top-100">
					<form>
						<label>Date range</label>
					    <div class="form-group">
					     <input type="date" name="">
					     <input type="date" name=""> 
					    </div>
					</form>
				</div>	
			</div><br><br>
			<div class="row">
				<form class="form-group ">
					<input type="button" class="custom-button btn btn-sm btn-default stat-btn"  name="" value="GET DATA">
				</form>
			</div>
		</div>

		<div class="stat border text-center margin-bottom-30  hidden">
			<img class="padding-top-20" src="img/stat.jpg">
			<div>CREDIT LIMIT - 100000</div>
		</div>

	</div>

</body>
</html>

select menu_name from core_menu_details cmd inner join core_menu_mapping_details cmmd on cmmd.r_menu_id =cmd.menu_id inner join dm_user_type dut on cmmd.r_user_type_id = dut.user_type_id inner join dm_account da on da.r_user_type_id = cmmd.r_user_type_id where da.r_user_type_id = 2 and da.r_employee_id =2
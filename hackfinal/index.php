<!DOCTYPE html>
<html>
<head>
	<title>main</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<style type="text/css">
		.custom-fluid{
			margin: 0px !important;
			padding: 0px; 
		}
		.margin-top-20{
			margin-top: 20px;
		}
		.font-20{
			font-size: 20px;
		}
		.navbar .collapse .nav .main-color{
			color: #092247 !important;
		}
		.height-80{
			padding-top: 5px;
			height: 80px;
			background: #092247;
			width: 100%;
			font-size: 50px;
			font-family: script;
			color: white;
		}
		.div-btn{
			height:100px;
			width: 250px;
			color: white !important;
			background: #d01b2e !important;
			font-size: 20px;
			border-radius: 10px;
		}
		.text-decoration a{
			color: white;
			text-decoration: none;
		}
		.padding-btn{
			padding-left: 20px;
			padding-top: 30px;
			font-size: 30px;
			font-family: sans-serif;
		}
		.click{
			color:white !important;
			background: #092247 !important;
		}
		.hover1:hover{
			color:white !important;
			background: #092247 !important;
		}
		.hover2:hover{
			color:white !important;
			background: #092247 !important;
		}
		.text-decoration{
			margin-top: 150px;
		}
		.main{
			background-image: url("img/main.jpg");
			height: 400px;
			width: 100%;
			position: relative;
		}
		.submain{
			position: absolute;
			top:200px;
			right: 100px;
		}
	</style>
</head>
<body>
	<div class="container-fluid custom-fluid">
		<div class="container-fluid">
			<nav class="navbar margin-top-20">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <a class="navbar-brand" href="http://infinitisoftware.net/"><img src="img/Website-logo.svg" height="50px" width="200px"></a>
			    </div> 
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav navbar-right main-list">
			        <li class="font-20 margin-top-20 main-color"><a href="#" class="hover1"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			        <li class="font-20 margin-top-20 main-color"><a href="signin.php" class="hover2"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      </ul>
			    </div>
			  </div>
			</nav>
		</div>
		<div class="container-fluid height-80">
			AUTO FORECASTING
		</div>
		<div class="container-fluid margin-top-20">
			<div class="row">
				<div class="col-md-12 text-center main">

				</div>
				<div class="submain">
					<div class="row">
						<div class="col-md-12 text-decoration">
							
								<a href="signin.php?msg=You need to sign in first" >
									<div class="padding-btn div-btn"> 
										FORECASTING
									</div>
								</a>
								
						</div>
					</div>
				</div>
			</div>
		</div>
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
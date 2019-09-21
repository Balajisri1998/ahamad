<?php 
session_start();
require_once("config.php");


 		  $_SuserName = $_POST['username'];
		  $_Spassword = $_POST['password'];
		  


		if((isset($_SuserName) && $_SuserName !='') &&(isset($_Spassword)&&  $_Spassword !=''))
		{
		 
		 require_once("uservalidation.php");

		}
?>
<?php
	
	$query = "select * from dm_employee where email_id = '".trim($_SuserName)."'";
	
	$user = $conn->query($query);

	if($user->num_rows > 0)
	{
		while($user_data = $user->fetch_assoc())
		{ 
			$emp_id = $user_data['employee_id'];
			$_SESSION['name'] = $user_data['first_name'];
			$_SESSION['emp_id'] = $emp_id;
		}
		$query1="select * from dm_account da inner join dm_employee de on de.employee_id = da.r_employee_id  where r_employee_id= ".$emp_id;;
		$pass = $conn->query($query1);
		if($pass->num_rows > 0)
		{
			while ( $_Tpassword = $pass->fetch_assoc() ) {
				$password = $_Tpassword['login_password'];
				$user_type_id = $_Tpassword['r_user_type_id'];
				$_SESSION['type'] = $user_type_id;
			}
		}
	
		if($_Spassword == $password)
		{
			require 'forecast.php';
		}
		else
		{
			header("location:signin.php?msg=Please enter valid password");
		}
	} 
	else{
		header("location:signin.php?msg=Please enter valid credentials");
	}

?>
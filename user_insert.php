<?php
	include("includes/connection.php");
	if (isset($_POST['sign_up'])) {
		
		$name = mysqli_real_escape_string($conn,$_POST['u_name']); 
		$email = mysqli_real_escape_string($conn,$_POST['u_email']);   
		$pass = mysqli_real_escape_string($conn,$_POST['u_pass']);
		$cpass = mysqli_real_escape_string($conn,$_POST['u_cpass']);
		$country = mysqli_real_escape_string($conn,$_POST['u_country']);
		$gender =mysqli_real_escape_string($conn, $_POST['u_gender']);  
		$jday =mysqli_real_escape_string($conn, $_POST['u_jday']); 
		$reg = mysqli_real_escape_string($conn,$_POST['u_reg']);
		$course = mysqli_real_escape_string($conn,$_POST['u_course']);
		$branch = mysqli_real_escape_string($conn,$_POST['u_branch']);
		$address = mysqli_real_escape_string($conn,$_POST['u_address']);
		$job = mysqli_real_escape_string($conn,$_POST['u_job']);
		$status="unverified";
		$posts = "No";
		$get_email = "select * from users where user_email = '$email'";
		$run_email = mysqli_query($conn,$get_email);
		$check = mysqli_num_rows($run_email);
		if ($check == 1) {
			echo "<script>alert('This email already exists')</script>";
			exit();
		}
		if (strlen($pass)<8) {
			echo "<script>alert('Password should be minimim 8 characters')</script>";
			exit();
		}
		$get_reg = "select * from users where user_reg = '$reg'";
		$run_reg = mysqli_query($conn,$get_reg);
		$check = mysqli_num_rows($run_reg);
		if ($check == 1) {
			echo "<script>alert('Number already register')</script>";
			exit();
		}
		if (!($pass == $cpass)) {
			echo "<script>alert('password mismatch')</script>";
			exit();
		}
		else{
			//$hashedpwd = password_hash($pass,PASSWORD_DEFAULT);
		    $hashedpwd = md5($pass);
			$insert = "insert into users (user_name,user_email,user_pass,user_country,user_gender,user_j_day,user_reg,user_image,register_date,last_login,status,posts,user_course,user_branch,user_address,user_job) values ('$name','$email','$hashedpwd','$country','$gender','$jday','$reg','default.jpg',
			Now(),Now(),'$status','$posts','$course','$branch','$address','$job')";
			$run_insert = mysqli_query($conn,$insert);
			if ($run_insert) {
				$_SESSION['user_email'] = $email;
			echo "<script>alert('registration successful')</script>";
			echo "<script>window.open('home.php','self')</script>";
				
			}
		}

	}
?>
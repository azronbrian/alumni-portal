<?php
//session_start();
	include("includes/connection.php");
	if (isset($_POST['login'])) {
		 
		$email = mysqli_real_escape_string($conn,$_POST['email']);   
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);
		$hash = md5($pass);

		$get_user = "select * from users where user_email = '$email' AND user_pass='$hash'";
		$run_user = mysqli_query($conn,$get_user);
		$check = mysqli_num_rows($run_user);
		if ($check == 1) {
			$_SESSION['user_email'] = $email;
			echo "<script>window.open('home.php','self')</script>";
		}
	else{

		echo "<script>alert('password or email is not valid')</script>";
	}
}

?>
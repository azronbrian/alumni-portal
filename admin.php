<?php
include("includes/header.php");
include("includes/connection.php");
include("includes/functions.php");
session_start();
$msg='';$msg2='';$fname='';
if (isset($_POST['submit'])) {
	$fname=$_POST['name'];
	$password=$_POST['pass'];
	if (empty($fname)) {
		$msg='<div class="error">Please enter your name</div>';
	}
	else if (empty($password)) {
		$msg2='<div class="error">Please enter your password</div>';
	}
	else{
		$pass=mysqli_query($conn,"select password from admin where name='$fname'");
		$pass_w=mysqli_fetch_array($pass);
		$dbpass=$pass_w['password'];
		if ($password!==$dbpass) {
			$msg2='<div class="error">password is wrong</div>';
		}
		else{
			$_SESSION['name']=$fname;
			header("location:admin-panel.php");
		}
	}
}
?>

<title>Admin Login</title>
</head>
<body>
	<div id="main">
		<div id="first">
			<form method="post" >
				<h2>Admin Login</h2>
				<input type="text" name="name" placeholder="username" class="form-control" value="<?php echo $fname;?>">
				<?php echo $msg;?>
				<input type="password" name="pass" placeholder="password" class="form-control">
				<?php echo $msg2;?>
				<input type="submit" name="submit" value="Login" class="btn-success">
			</form>
		</div>
	</div>			
</body>
</html>

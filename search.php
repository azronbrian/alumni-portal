<?php
include("includes/header.php");
include("includes/connection.php");


session_start();
$name = $_SESSION['name'];
if (isset($_POST['submit-search'])) {
	$search=mysqli_real_escape_string($conn,$_POST['search']);
	$sql = "select user_id,user_name,user_email,user_country,user_gender,user_reg ,user_course,user_branch,user_j_day,user_address,user_job from users where  user_course LIKE '%$search%' OR user_branch LIKE '%$search%' OR user_reg LIKE '%$search%' OR user_j_day LIKE '%$search%' order by user_id desc";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_num_rows($result);
	if($row>0)
	{
	echo "<div class='container'>";
	echo "<h3> Welcome to Admin panel</h3>";
	echo "<h3>Total $search Registered users: $row</h3>";
	
	echo'<form class="search" action="search.php" method="POST">
		<input  type="text" name="search" placeholder="search">
        <button type="submit" name="submit-search">Search</button>
        
	</form>';





	
	echo "<a href='admin-logout.php'><button class='btn'>Logout</button></a>";
	echo"</br></br>";
	echo "<table class = 'table table-striped table-bordered table-responsive' border='1' align='center'>";
	echo "<tr align='center'>";
	echo "<th>S.no</th>";
	echo "<th>Name</th>";
	echo "<th>Email</th>";
	echo "<th>Country</th>";
	echo "<th>Gender</th>";
	echo "<th>Registration</th>";
	echo "<th>Course</th>";
	echo "<th>Branch</th>";
	echo "<th>Graduation Year</th>";
	echo "<th>Address</th>";
	echo "<th>Job</th>";
	echo "<th>Delete user</th>";
	echo "</tr>";
	$i=0;
	while($retrieve=mysqli_fetch_array($result)){
	    $id = $retrieve['user_id'];
		$fname = $retrieve['user_name'];
		$email = $retrieve['user_email'];
		$country = $retrieve['user_country'];
		$gender = $retrieve['user_gender'];
		$reg= $retrieve['user_reg'];
		$course= $retrieve['user_course'];
		$branch = $retrieve['user_branch'];
		$joinday = $retrieve['user_j_day'];
		$address= $retrieve['user_address'];
		$job= $retrieve['user_job'];
		echo "<tr align='center'>";
		echo "<th>".$i=$i+1;"</th>";
		echo "<th>$fname</th>";
		echo "<th>$email</th>";
		echo "<th>$country</th>";
		echo "<th>$gender</th>";
		echo "<th>$reg</th>";
		echo "<th>$course</th>";
		echo "<th>$branch</th>";
		echo "<th>$joinday</th>";
		echo "<th>$address</th>";
		echo "<th>$job</th>";
		echo "<th><a href='delete-admin.php?del=$id'><button class='btn1'>Delete</button></a></th>";

		echo "</tr>";
		
	}
	echo"</table>";
}
	else{
		echo "<h2>There are no results matching your search!</h2>";
	}
}
else
{
	header("location:admin.php");
}
?>

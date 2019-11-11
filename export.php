<?php


include("includes/connection.php");

if (isset($_POST['export'])) {

	header('content-type: text/csv; charset=utf-8');
	header('content-Disposition: attachment; filename=data.csv');
	$output = fopen('php://output','w');
	fputcsv($output,array('Name','Email','Country','Gender','Registration','Course','Branch','Graduation Year','Address','Job'));
	
    

	$query='select user_name,user_email,user_country,user_gender,user_reg ,user_course,user_branch,user_j_day,user_address,user_job from users order by user_id desc';
	$result = mysqli_query($conn,$query);
	while($row=mysqli_fetch_assoc($result))
	{
		fputcsv($output,$row);
	}
	fclose($output);


}


?>
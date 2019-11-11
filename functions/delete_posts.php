<?php
$conn = mysqli_connect("localhost","u426244392_admin","dashword1994","u426244392_db") or die("connection was not established");
if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
	$delete_post = "delete from posts where post_id = '$post_id'";
	$run_delete = mysqli_query($conn,$delete_post);
	if ($run_delete) {
		echo "<script>alert('A post has been deleted')</script>";
		echo "<script>window.open('../home.php','_self')</script>";
	}
 }
?>

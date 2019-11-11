<?php
include('includes/connection.php');
$id=$_GET['del'];
mysqli_query($conn,"DELETE FROM users WHERE user_id='$id'");

header("location:admin-panel.php");


?>
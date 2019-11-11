<?php
  session_start();
  include("includes/connection.php");
  include("functions/functions.php");
  if (!isset($_SESSION['user_email'])) {
  	header("location: index.php");
  }
  else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome user!</title>
	<link rel="stylesheet" type="text/css" href="styles/home_style.css" media="all">
</head>
<body>
	<!-- container starts-->
    <div class="container">
    	<!-- head wrapper starts-->
    	<div id="head_wrap">
    		<!-- header  starts-->
    		<div id="header">
    			<ul id="menu">
    				<li><a href=" home.php">Home</a></li>
    				<li><a href=" members.php">Members</a></li>
    				<strong>Topics</strong>
    				<?php
                      $get_topics = "select * from topics";
                      $run_topics = mysqli_query($conn,$get_topics);
                      while($row = mysqli_fetch_array($run_topics)){
                      	$topic_id = $row['topic_id'];
                      	$topic_title = $row['topic_title'];

                      	echo"<li><a href='topic.php?topic=$topic_id'>$topic_title</a></li>";
                      }
    				?>

    			</ul>
    			<form method="get" action="results.php" id="form1">
    				<input type="text" name="user_query" placeholder="search a topic">
    				<input type="submit" name="search" value="search">

    			</form>
    			
    		</div>
    		<!-- head ends-->
    	</div>
    	<!-- head wrapper ends-->
    		<!--content area starts -->
    	<div class="content">
    		<!-- user timeline starts-->
    		<div id = "user_timeline">
    			<div id="user_details">
    				<?php
    				$user = $_SESSION['user_email'];
    				$get_user = "select * from users where user_email ='$user'";
    				$run_user = mysqli_query($conn,$get_user);
    				$row = mysqli_fetch_array($run_user);
    				$user_id = $row['user_id'];
    				$user_name = $row['user_name'];
    				$user_email = $row['user_email'];
    				$user_country = $row['user_country'];
    				$user_image = $row['user_image'];
    				$register_date = $row['register_date'];
    				$last_login = $row['last_login'];

    				echo " 
    				       <center> <img src='user/user_images/$user_image' width = '150' height = '150'/></center>
    				        <div id='user_mention'>
    				       <p><strong>Name:</strong> $user_name</p>
    				       <p><strong>Country:</strong> $user_country</p>
    				       <p><strong>Email:</strong> $user_email</p>
    				       <p><strong>Login:</strong> $last_login</p>
    				       <p><strong>Member since:</strong> $register_date</p>
    				       <p><a href='my_messages.php'>Messages</a></p>
    				       <p><a href='my_posts.php'>My Posts</a></p>
    				       <p><a href='edit_profile.php'>Edit My Account</a></p>

    				       <form action='logout.php' method='POST'>
						<button type='submit' name='submit' >Logout</button>
					</form>
    				       </div>

    				";

    				?>
    				
    			</div>
    			
    		</div>
    		<!--user timeline ends -->
    		<!--content timeline starts -->
    		<div id="content_timeline">
    			<form action="home.php?id=<?php echo $user_id;?>" method="post" id="f">
                    <h2>what's your question? let's discuss</h2>
                    <input type="text" name="title" placeholder="write a title" size="72"><br>
                    <textarea cols="65" rows="4" name="content" placeholder="write description"></textarea><br>
                    <select name="topic">
                    	<option>select topic</option>
                    	<?php getTopics();?>

                    </select>
                    <input type="submit" name="sub" value="Post to Timeline">
    			</form>
    			<?php insertPost();?>
    			
    				<h3>All Posts in this Category</h3>
    				<?php get_Cats();?>
    				
    			
    		</div>
    		<!--content timeline ends -->
    		
    	</div>
    	<!--content area ends -->
    </div>
    <!-- container ends-->	

</body>
</html>
<?php } ?>